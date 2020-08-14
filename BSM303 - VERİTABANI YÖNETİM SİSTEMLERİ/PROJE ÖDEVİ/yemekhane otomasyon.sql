--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: kart_bakiye_update(numeric, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.kart_bakiye_update(_bakiye numeric, _no integer) RETURNS void
    LANGUAGE plpgsql
    AS $$ 
begin 
	update kart set son_aktif = now(),kart_bakiye = _bakiye where kart_no = _no;
end;
$$;


ALTER FUNCTION public.kart_bakiye_update(_bakiye numeric, _no integer) OWNER TO postgres;

--
-- Name: kart_olusturma(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.kart_olusturma() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
		insert into kart (kart_durumu,ogrenci_no,kart_bakiye,son_aktif) 
		values(true,NEW.ogrenci_no,0,now());
		RETURN NEW;
END;
$$;


ALTER FUNCTION public.kart_olusturma() OWNER TO postgres;

--
-- Name: ogr_ad_buyuk_yapma(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.ogr_ad_buyuk_yapma() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	update ogrenci set ad = UPPER(ad) ,soyad =UPPER(soyad) where ogrenci_no = new.ogrenci_no;
	RETURN OLD;
END;
$$;


ALTER FUNCTION public.ogr_ad_buyuk_yapma() OWNER TO postgres;

--
-- Name: ogr_gecmis(integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.ogr_gecmis(_no integer) RETURNS TABLE(_ogun character varying, _yemekhane character varying, _fatura_tarihi date, _fatura_saati time without time zone)
    LANGUAGE plpgsql
    AS $$begin
	return query select ogun, yemekhane,fatura_tarihi,fatura_saati
		from kart k 
		inner join gise g on g.kart_no = k.kart_no
		inner join fatura f on g.fatura_no = f.fatura_no
		where k.kart_no=_no  order by fatura_tarihi;
end;
$$;


ALTER FUNCTION public.ogr_gecmis(_no integer) OWNER TO postgres;

--
-- Name: ogr_girisi(character varying, character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.ogr_girisi(_no character varying, _sifre character varying) RETURNS integer
    LANGUAGE plpgsql
    AS $$
begin 
	if(select count(*) from ogrenci where ogrenci_no = _no and sifre =_sifre) >0 then
		return 1;	--basarılı giris
	else
		return 0;	--hatalı giris
	end if;
end
$$;


ALTER FUNCTION public.ogr_girisi(_no character varying, _sifre character varying) OWNER TO postgres;

--
-- Name: ogr_kart_sorgu(character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.ogr_kart_sorgu(_ogr_no character varying) RETURNS TABLE(_ad character varying, _soyad character varying, _kart_no integer, _kart_bakiye numeric, _son_aktif date, _kart_durumu boolean)
    LANGUAGE plpgsql
    AS $$
begin
	return query SELECT ad,soyad,kart_no,kart_bakiye,son_aktif,kart_durumu 
		FROM ogrenci o 
		JOIN kart krt ON o.ogrenci_no = krt.ogrenci_no 
		where o.ogrenci_no = _ogr_no; 
end;
$$;


ALTER FUNCTION public.ogr_kart_sorgu(_ogr_no character varying) OWNER TO postgres;

--
-- Name: ogr_sorgu(integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.ogr_sorgu(_no integer) RETURNS TABLE(_ad character varying, _soyad character varying, _kart_bakiye numeric, _kart_durumu boolean)
    LANGUAGE plpgsql
    AS $$begin
return query SELECT ad,soyad,kart_bakiye,kart_durumu 
	FROM ogrenci o 
	JOIN kart krt ON o.ogrenci_no = krt.ogrenci_no 
	where kart_no = _no; 
end;
$$;


ALTER FUNCTION public.ogr_sorgu(_no integer) OWNER TO postgres;

--
-- Name: ogrenciler(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.ogrenciler() RETURNS TABLE(_kart_no integer, _ogrenci_no character varying, _ad character varying, _soyad character varying, _kart_bakiye numeric, _kart_durumu boolean, _son_aktif date)
    LANGUAGE plpgsql
    AS $$
begin
	return query SELECT kart_no,o.ogrenci_no,ad,soyad,kart_bakiye,kart_durumu,son_aktif
		FROM ogrenci o 
		JOIN kart krt ON o.ogrenci_no = krt.ogrenci_no;
end;
$$;


ALTER FUNCTION public.ogrenciler() OWNER TO postgres;

--
-- Name: ogun_silme(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.ogun_silme() RETURNS trigger
    LANGUAGE plpgsql
    AS $$BEGIN
	insert into silinenogun values(old.ogun,now());
	insert into silinenler
		select kart_no,fatura_no,ogun,yemekhane
		from gise where ogun=old.ogun;
	RETURN OLD;
END;
$$;


ALTER FUNCTION public.ogun_silme() OWNER TO postgres;

--
-- Name: ogun_sorgu(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.ogun_sorgu() RETURNS TABLE(_ogun character varying, _ogun_ucret real)
    LANGUAGE plpgsql
    AS $$
begin
return query SELECT ogun,ucret from ogun where DATE_PART('hour', baslama_saati::time - now()::time)* 60+ 
	 DATE_PART('minute', baslama_saati::time - now()::time)<=-1 and
	 DATE_PART('hour', bitis_saati::time - now()::time)* 60+ 
	 DATE_PART('minute', bitis_saati::time - now()::time)>=1; 
end;
$$;


ALTER FUNCTION public.ogun_sorgu() OWNER TO postgres;

--
-- Name: personel_girisi(character varying, character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.personel_girisi(_no character varying, _sifre character varying) RETURNS integer
    LANGUAGE plpgsql
    AS $$
begin 
	if(select count(*) from personel where personel_no = _no and sifre =_sifre) >0 then
		return 1;	--basarılı giris
	else
		return 0;	--hatalı giris
	end if;
end
$$;


ALTER FUNCTION public.personel_girisi(_no character varying, _sifre character varying) OWNER TO postgres;

--
-- Name: yemek_sorgu(character varying, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.yemek_sorgu(_ogun character varying, _kart_no integer) RETURNS integer
    LANGUAGE plpgsql
    AS $$begin 
	if(select count(*) from gise where ogun=_ogun and kart_no =_kart_no and fatura_no in(
		select fatura_no from fatura where fatura_tarihi= now()::date)) >0 then
		return 1;	--ogrenci bugun secilen ogunde yemek yemistir
	else
		return 0;	--yemek yememistir.
	end if;
end
$$;


ALTER FUNCTION public.yemek_sorgu(_ogun character varying, _kart_no integer) OWNER TO postgres;

--
-- Name: yemekhane_silme(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.yemekhane_silme() RETURNS trigger
    LANGUAGE plpgsql
    AS $$BEGIN
	insert into silinenyemekhane values(old.yemekhane,now());
	insert into silinenler
		select kart_no,fatura_no,ogun,yemekhane
		from gise where yemekhane=old.yemekhane;
	RETURN OLD;
END;
$$;


ALTER FUNCTION public.yemekhane_silme() OWNER TO postgres;

--
-- Name: yiyenlerin_listesi(character varying, character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.yiyenlerin_listesi(_ogun character varying, _yemekhane character varying) RETURNS TABLE(_ogrenci_no character varying, _fatura_saati time without time zone)
    LANGUAGE plpgsql
    AS $$begin
	return query select ogrenci_no, fatura_saati
	from kart k 
	inner join gise g on g.kart_no = k.kart_no
	inner join fatura f on g.fatura_no = f.fatura_no
	where fatura_tarihi= now()::date and ogun=_ogun and yemekhane = _yemekhane order by fatura_saati;
end; $$;


ALTER FUNCTION public.yiyenlerin_listesi(_ogun character varying, _yemekhane character varying) OWNER TO postgres;

--
-- Name: yonetici_girisi(character varying, character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.yonetici_girisi(_no character varying, _sifre character varying) RETURNS integer
    LANGUAGE plpgsql
    AS $$
begin 
	if(select count(*) from yonetici where yonetici_no = _no and sifre =_sifre) >0 then
		return 1;	--basarılı giris
	else
		return 0;	--hatalı giris
	end if;
end
$$;


ALTER FUNCTION public.yonetici_girisi(_no character varying, _sifre character varying) OWNER TO postgres;

--
-- Name: fatura_faturano_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.fatura_faturano_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;


ALTER TABLE public.fatura_faturano_seq OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: fatura; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fatura (
    fatura_no integer DEFAULT nextval('public.fatura_faturano_seq'::regclass) NOT NULL,
    fatura_tarihi date NOT NULL,
    fatura_saati time without time zone NOT NULL
);


ALTER TABLE public.fatura OWNER TO postgres;

--
-- Name: gise; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.gise (
    kart_no integer NOT NULL,
    fatura_no integer NOT NULL,
    ogun character varying(15) NOT NULL,
    yemekhane character varying(15) NOT NULL
);


ALTER TABLE public.gise OWNER TO postgres;

--
-- Name: kart; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kart (
    kart_no integer NOT NULL,
    ogrenci_no character varying(10) NOT NULL,
    kart_bakiye numeric,
    son_aktif date,
    kart_durumu boolean,
    son_islem_personel_no character varying(10)
);


ALTER TABLE public.kart OWNER TO postgres;

--
-- Name: kart_kartno_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.kart_kartno_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kart_kartno_seq OWNER TO postgres;

--
-- Name: kart_kartno_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kart_kartno_seq OWNED BY public.kart.kart_no;


--
-- Name: ogrenci; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ogrenci (
    ogrenci_no character varying(10) NOT NULL,
    sifre character varying(20) NOT NULL,
    soyad character varying(20) NOT NULL,
    ad character varying(20) NOT NULL
);


ALTER TABLE public.ogrenci OWNER TO postgres;

--
-- Name: ogun; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ogun (
    baslama_saati time without time zone NOT NULL,
    bitis_saati time without time zone NOT NULL,
    ogun character varying(15) NOT NULL,
    ucret real NOT NULL
);


ALTER TABLE public.ogun OWNER TO postgres;

--
-- Name: personel; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personel (
    personel_no character varying(10) NOT NULL,
    ad character varying(20) NOT NULL,
    soyad character varying(20),
    sifre character varying(20) NOT NULL,
    yonetici_no character varying(15) NOT NULL
);


ALTER TABLE public.personel OWNER TO postgres;

--
-- Name: silinenler; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.silinenler (
    kart_no integer NOT NULL,
    fatura_no integer NOT NULL,
    ogun character varying(15) NOT NULL,
    yemekhane character varying(15) NOT NULL
);


ALTER TABLE public.silinenler OWNER TO postgres;

--
-- Name: silinenogun; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.silinenogun (
    ogun character varying(15) NOT NULL,
    silinme_tarihi date NOT NULL
);


ALTER TABLE public.silinenogun OWNER TO postgres;

--
-- Name: silinenyemekhane; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.silinenyemekhane (
    yemekhane character varying(15) NOT NULL,
    silinme_tarihi date NOT NULL
);


ALTER TABLE public.silinenyemekhane OWNER TO postgres;

--
-- Name: yemekhane; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.yemekhane (
    yemekhane character varying(15) NOT NULL,
    adres character varying(100),
    detaylar character varying
);


ALTER TABLE public.yemekhane OWNER TO postgres;

--
-- Name: yonetici; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.yonetici (
    yonetici_no character varying(10) NOT NULL,
    ad character varying(20) NOT NULL,
    soyad character varying(20),
    sifre character varying(20) NOT NULL
);


ALTER TABLE public.yonetici OWNER TO postgres;

--
-- Name: kart kart_no; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kart ALTER COLUMN kart_no SET DEFAULT nextval('public.kart_kartno_seq'::regclass);


--
-- Data for Name: fatura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.fatura VALUES (1000038, '2020-08-02', '15:54:25');
INSERT INTO public.fatura VALUES (1000039, '2020-08-02', '15:56:14');
INSERT INTO public.fatura VALUES (1000040, '2020-08-02', '16:09:52');
INSERT INTO public.fatura VALUES (1000041, '2020-08-02', '16:23:42');
INSERT INTO public.fatura VALUES (1000042, '2020-08-02', '16:26:45');
INSERT INTO public.fatura VALUES (1000043, '2020-08-03', '19:08:34');
INSERT INTO public.fatura VALUES (1000044, '2020-08-03', '21:25:23');
INSERT INTO public.fatura VALUES (1000045, '2020-08-03', '21:25:27');
INSERT INTO public.fatura VALUES (1000046, '2020-08-03', '21:25:43');
INSERT INTO public.fatura VALUES (1000047, '2020-08-03', '21:25:46');
INSERT INTO public.fatura VALUES (1000048, '2020-08-03', '21:26:25');
INSERT INTO public.fatura VALUES (1000049, '2020-08-03', '21:27:39');
INSERT INTO public.fatura VALUES (1000050, '2020-08-03', '21:27:40');
INSERT INTO public.fatura VALUES (1000051, '2020-08-03', '21:30:33');
INSERT INTO public.fatura VALUES (1000052, '2020-08-03', '21:34:05');
INSERT INTO public.fatura VALUES (1000053, '2020-08-03', '21:34:51');
INSERT INTO public.fatura VALUES (1000054, '2020-08-03', '21:35:08');
INSERT INTO public.fatura VALUES (1000055, '2020-08-03', '21:36:20');
INSERT INTO public.fatura VALUES (1000056, '2020-08-03', '21:37:04');
INSERT INTO public.fatura VALUES (1000057, '2020-08-03', '21:39:06');
INSERT INTO public.fatura VALUES (1000063, '2020-08-04', '02:00:51');
INSERT INTO public.fatura VALUES (1000064, '2020-08-04', '17:12:56');
INSERT INTO public.fatura VALUES (1000065, '2020-08-04', '23:14:22');
INSERT INTO public.fatura VALUES (1000066, '2020-08-04', '23:30:29');
INSERT INTO public.fatura VALUES (1000067, '2020-08-04', '23:30:35');
INSERT INTO public.fatura VALUES (1000068, '2020-08-04', '23:41:58');
INSERT INTO public.fatura VALUES (1000069, '2020-08-04', '23:42:03');
INSERT INTO public.fatura VALUES (1000070, '2020-08-04', '23:42:12');
INSERT INTO public.fatura VALUES (1000071, '2020-08-04', '23:42:19');
INSERT INTO public.fatura VALUES (1000072, '2020-08-04', '23:45:57');
INSERT INTO public.fatura VALUES (1000073, '2020-08-04', '23:46:07');
INSERT INTO public.fatura VALUES (1000074, '2020-08-04', '23:46:18');
INSERT INTO public.fatura VALUES (1000075, '2020-08-05', '22:00:57');
INSERT INTO public.fatura VALUES (1000076, '2020-08-05', '22:01:16');
INSERT INTO public.fatura VALUES (1000077, '2020-08-05', '22:01:31');
INSERT INTO public.fatura VALUES (1000078, '2020-08-06', '04:46:34');
INSERT INTO public.fatura VALUES (1000079, '2020-08-06', '14:26:55');
INSERT INTO public.fatura VALUES (1000080, '2020-08-06', '14:28:35');
INSERT INTO public.fatura VALUES (1000081, '2020-08-07', '04:21:13');
INSERT INTO public.fatura VALUES (1000082, '2020-08-07', '04:21:26');
INSERT INTO public.fatura VALUES (1000083, '2020-08-08', '00:43:50');
INSERT INTO public.fatura VALUES (1000084, '2020-08-08', '00:44:26');
INSERT INTO public.fatura VALUES (1000085, '2020-08-08', '00:44:47');
INSERT INTO public.fatura VALUES (1000086, '2020-08-08', '00:46:01');
INSERT INTO public.fatura VALUES (1000087, '2020-08-08', '00:46:11');
INSERT INTO public.fatura VALUES (1000088, '2020-08-08', '00:46:15');
INSERT INTO public.fatura VALUES (1000089, '2020-08-09', '21:03:59');
INSERT INTO public.fatura VALUES (1000090, '2020-08-09', '21:04:01');
INSERT INTO public.fatura VALUES (1000091, '2020-08-09', '21:04:09');
INSERT INTO public.fatura VALUES (1000092, '2020-08-09', '21:13:39');
INSERT INTO public.fatura VALUES (1000093, '2020-08-09', '21:16:02');
INSERT INTO public.fatura VALUES (1000094, '2020-08-09', '21:18:23');
INSERT INTO public.fatura VALUES (1000095, '2020-08-10', '16:32:41');
INSERT INTO public.fatura VALUES (1000096, '2020-08-10', '16:32:54');
INSERT INTO public.fatura VALUES (1000097, '2020-08-10', '16:33:07');
INSERT INTO public.fatura VALUES (1000037, '2020-08-02', '15:32:20');
INSERT INTO public.fatura VALUES (1000036, '2020-08-02', '15:32:12');
INSERT INTO public.fatura VALUES (1000035, '2020-08-02', '15:32:02');
INSERT INTO public.fatura VALUES (1000034, '2020-08-02', '01:01:50');
INSERT INTO public.fatura VALUES (1000033, '2020-08-02', '00:59:40');
INSERT INTO public.fatura VALUES (1000032, '2020-08-02', '00:54:53');
INSERT INTO public.fatura VALUES (1000031, '2020-08-02', '00:49:04');
INSERT INTO public.fatura VALUES (1000030, '2020-08-02', '00:46:27');
INSERT INTO public.fatura VALUES (1000029, '2020-08-02', '00:43:35');
INSERT INTO public.fatura VALUES (1000028, '2020-08-02', '00:42:38');
INSERT INTO public.fatura VALUES (1000027, '2020-08-02', '00:42:03');
INSERT INTO public.fatura VALUES (1000026, '2020-08-02', '00:06:04');
INSERT INTO public.fatura VALUES (1000001, '2020-07-29', '03:39:01');
INSERT INTO public.fatura VALUES (1000003, '2020-07-29', '17:13:03');
INSERT INTO public.fatura VALUES (1000002, '2020-07-29', '03:56:39');
INSERT INTO public.fatura VALUES (1000004, '2020-07-29', '17:14:36');
INSERT INTO public.fatura VALUES (1000006, '2020-07-29', '17:59:48');
INSERT INTO public.fatura VALUES (1000005, '2020-07-29', '17:14:37');
INSERT INTO public.fatura VALUES (1000007, '2020-07-29', '18:16:56');
INSERT INTO public.fatura VALUES (1000008, '2020-07-31', '18:56:00');
INSERT INTO public.fatura VALUES (1000009, '2020-07-31', '18:56:14');
INSERT INTO public.fatura VALUES (1000010, '2020-07-31', '20:00:38');
INSERT INTO public.fatura VALUES (1000011, '2020-07-31', '20:00:49');
INSERT INTO public.fatura VALUES (1000013, '2020-07-31', '20:00:51');
INSERT INTO public.fatura VALUES (1000012, '2020-07-31', '20:00:51');
INSERT INTO public.fatura VALUES (1000025, '2020-08-02', '00:05:58');
INSERT INTO public.fatura VALUES (1000014, '2020-07-31', '20:00:53');
INSERT INTO public.fatura VALUES (1000015, '2020-07-31', '20:01:38');
INSERT INTO public.fatura VALUES (1000016, '2020-07-31', '21:07:42');
INSERT INTO public.fatura VALUES (1000017, '2020-07-31', '21:08:31');
INSERT INTO public.fatura VALUES (1000018, '2020-07-31', '21:09:18');
INSERT INTO public.fatura VALUES (1000019, '2020-08-01', '14:36:42');
INSERT INTO public.fatura VALUES (1000024, '2020-08-01', '20:41:10');
INSERT INTO public.fatura VALUES (1000020, '2020-08-01', '14:40:54');
INSERT INTO public.fatura VALUES (1000021, '2020-08-01', '14:59:56');
INSERT INTO public.fatura VALUES (1000022, '2020-08-01', '20:40:50');
INSERT INTO public.fatura VALUES (1000023, '2020-08-01', '20:41:02');
INSERT INTO public.fatura VALUES (1000098, '2020-08-10', '21:55:17');
INSERT INTO public.fatura VALUES (1000099, '2020-08-10', '21:56:40');
INSERT INTO public.fatura VALUES (1000100, '2020-08-10', '21:57:14');
INSERT INTO public.fatura VALUES (1000101, '2020-08-13', '17:27:38');
INSERT INTO public.fatura VALUES (1000102, '2020-08-13', '17:28:09');
INSERT INTO public.fatura VALUES (1000103, '2020-08-13', '17:28:31');
INSERT INTO public.fatura VALUES (1000104, '2020-08-13', '22:19:24');
INSERT INTO public.fatura VALUES (1000105, '2020-08-13', '22:19:38');
INSERT INTO public.fatura VALUES (1000106, '2020-08-13', '22:19:48');
INSERT INTO public.fatura VALUES (1000107, '2020-08-13', '22:47:04');
INSERT INTO public.fatura VALUES (1000108, '2020-08-14', '00:01:25');
INSERT INTO public.fatura VALUES (1000109, '2020-08-14', '00:08:31');
INSERT INTO public.fatura VALUES (1000110, '2020-08-14', '00:11:28');
INSERT INTO public.fatura VALUES (1000111, '2020-08-14', '00:11:47');
INSERT INTO public.fatura VALUES (1000112, '2020-08-14', '00:11:52');
INSERT INTO public.fatura VALUES (1000113, '2020-08-14', '15:29:34');
INSERT INTO public.fatura VALUES (1000114, '2020-08-14', '15:40:43');
INSERT INTO public.fatura VALUES (1000115, '2020-08-14', '15:41:12');
INSERT INTO public.fatura VALUES (1000116, '2020-08-14', '16:04:59');
INSERT INTO public.fatura VALUES (1000117, '2020-08-14', '16:05:10');


--
-- Data for Name: gise; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.gise VALUES (100001, 1000078, 'KAHVALTI', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100001, 1000079, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000080, 'AKŞAM', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100001, 1000081, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000082, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000083, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100003, 1000084, 'KAHVALTI', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100001, 1000025, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000026, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100003, 1000027, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100006, 1000030, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100007, 1000031, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100008, 1000032, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100009, 1000033, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100010, 1000034, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100004, 1000085, 'KAHVALTI', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100007, 1000086, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100009, 1000087, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100010, 1000088, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000095, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000096, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100007, 1000097, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000101, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000102, 'AKŞAM', 'YEMEKHANE 2');
INSERT INTO public.gise VALUES (100003, 1000103, 'AKŞAM', 'YEMEKHANE 2');
INSERT INTO public.gise VALUES (100002, 1000104, 'GECE', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000105, 'GECE', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100003, 1000106, 'GECE', 'YEMEKHANE 2');
INSERT INTO public.gise VALUES (100004, 1000107, 'GECE', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000108, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100010, 1000063, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000109, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100003, 1000110, 'KAHVALTI', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100004, 1000028, 'KAHVALTI', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100005, 1000029, 'KAHVALTI', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100001, 1000001, 'OGLE', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000019, 'OGLE', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000020, 'OGLE', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000007, 'AKŞAM', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100001, 1000008, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000009, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000021, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000035, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000036, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100003, 1000037, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100006, 1000040, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100007, 1000042, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000064, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100005, 1000111, 'KAHVALTI', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100009, 1000112, 'KAHVALTI', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100001, 1000113, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000114, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100003, 1000115, 'AKŞAM', 'YEMEKHANE 2');
INSERT INTO public.gise VALUES (100004, 1000116, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100005, 1000117, 'AKŞAM', 'YEMEKHANE 3');
INSERT INTO public.gise VALUES (100001, 1000010, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000011, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000012, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000013, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000014, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000015, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000016, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000017, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000018, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000022, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000023, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100003, 1000024, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100001, 1000043, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100002, 1000051, 'AKŞAM', 'YEMEKHANE 1');
INSERT INTO public.gise VALUES (100004, 1000052, 'AKŞAM', 'YEMEKHANE 1');


--
-- Data for Name: kart; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.kart VALUES (100058, 'g191210005', 0, '2020-08-04', true, NULL);
INSERT INTO public.kart VALUES (100059, 'g191210016', 0, '2020-08-05', true, NULL);
INSERT INTO public.kart VALUES (100006, 'g191210006', 6, '2020-08-13', true, 'p100000001');
INSERT INTO public.kart VALUES (100009, 'g191210010', 0, '2020-08-14', true, NULL);
INSERT INTO public.kart VALUES (100010, 'g191210012', 0, '2020-08-08', true, NULL);
INSERT INTO public.kart VALUES (100060, 'g191210017', 0, '2020-08-08', true, NULL);
INSERT INTO public.kart VALUES (100061, 'g191210018', 0, '2020-08-08', true, NULL);
INSERT INTO public.kart VALUES (100003, 'g191210002', 1, '2020-08-14', true, 'p100000001');
INSERT INTO public.kart VALUES (100004, 'g191210003', 7.5, '2020-08-14', true, 'p100000001');
INSERT INTO public.kart VALUES (100005, 'g191210004', 2.25, '2020-08-14', true, NULL);
INSERT INTO public.kart VALUES (100001, 'g191210077', 39.5, '2020-08-14', true, 'p100000001');
INSERT INTO public.kart VALUES (100008, 'g191210009', 2.5, '2020-08-02', false, NULL);
INSERT INTO public.kart VALUES (100002, 'g191210001', 30, '2020-08-14', true, 'p100000001');
INSERT INTO public.kart VALUES (100007, 'g191210007', 9.5, '2020-08-10', true, NULL);


--
-- Data for Name: ogrenci; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ogrenci VALUES ('g191210001', '123', 'AHÇI', 'JÜLİDE');
INSERT INTO public.ogrenci VALUES ('g191210004', '123', 'KOLUŞ', 'RAHMİ');
INSERT INTO public.ogrenci VALUES ('g191210002', '123', 'ÜNVER', 'MUHLİS');
INSERT INTO public.ogrenci VALUES ('g191210003', '123', 'DİLİPAK', 'AYŞEGÜL');
INSERT INTO public.ogrenci VALUES ('g191210011', '123', 'KOLUŞ', 'ŞAHİNDE');
INSERT INTO public.ogrenci VALUES ('g191210017', '123', 'DEMİR', 'MEHMET');
INSERT INTO public.ogrenci VALUES ('g191210077', '123', 'BAŞARAN', 'BURHAN');
INSERT INTO public.ogrenci VALUES ('g191210006', '123', 'BAŞAK', 'OLCAY');
INSERT INTO public.ogrenci VALUES ('g191210007', '123', 'ÖZATAY', 'REŞAT');
INSERT INTO public.ogrenci VALUES ('g191210008', '123', 'GÜRCAN', 'AYSU');
INSERT INTO public.ogrenci VALUES ('g191210009', '123', 'YURDUSEVEN', 'BİCEM');
INSERT INTO public.ogrenci VALUES ('g191210010', '123', 'YAYMAN', 'ÇİLE');
INSERT INTO public.ogrenci VALUES ('g191210012', '123', 'İMAMOĞLU', 'ATACAN');
INSERT INTO public.ogrenci VALUES ('g191210013', '123', 'KARLI', 'SEVGİ');
INSERT INTO public.ogrenci VALUES ('g191210014', '123', 'SETENAY', 'MERVE');
INSERT INTO public.ogrenci VALUES ('g191210015', '123', 'KAYRA', 'HAKKI');
INSERT INTO public.ogrenci VALUES ('g191210005', '123', 'YILMAZ', 'ALİ');
INSERT INTO public.ogrenci VALUES ('g191210018', '123', 'KEMAL', 'AYDIN');
INSERT INTO public.ogrenci VALUES ('g191210016', '123', 'KILIÇ', 'ŞAHİNDE');


--
-- Data for Name: ogun; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ogun VALUES ('00:00:00', '05:00:00', 'KAHVALTI', 1.25);
INSERT INTO public.ogun VALUES ('14:00:00', '19:00:00', 'AKŞAM', 2.5);
INSERT INTO public.ogun VALUES ('11:00:00', '14:00:00', 'OGLE', 2.2);
INSERT INTO public.ogun VALUES ('21:00:00', '23:59:00', 'GECE', 1.25);


--
-- Data for Name: personel; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.personel VALUES ('p100000001', 'Ahmet', 'Kandemir', '123', 'y100000001');


--
-- Data for Name: silinenler; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.silinenler VALUES (100001, 1000075, 'GECE', 'YEMEKHANE 1');
INSERT INTO public.silinenler VALUES (100002, 1000076, 'GECE', 'YEMEKHANE 1');
INSERT INTO public.silinenler VALUES (100004, 1000077, 'GECE', 'YEMEKHANE 3');
INSERT INTO public.silinenler VALUES (100001, 1000094, 'GECE', 'YEMEKHANE 1');
INSERT INTO public.silinenler VALUES (100001, 1000098, 'GECE', 'YEMEKHANE 1');
INSERT INTO public.silinenler VALUES (100002, 1000099, 'GECE', 'YEMEKHANE 1');
INSERT INTO public.silinenler VALUES (100003, 1000100, 'GECE', 'YEMEKHANE 1');


--
-- Data for Name: silinenogun; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.silinenogun VALUES ('YATSI', '2020-08-08');
INSERT INTO public.silinenogun VALUES ('GECE', '2020-08-13');
INSERT INTO public.silinenogun VALUES ('GECE2', '2020-08-14');
INSERT INTO public.silinenogun VALUES ('GECE2', '2020-08-14');


--
-- Data for Name: silinenyemekhane; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.silinenyemekhane VALUES ('YEMEKHANE 4', '2020-08-08');
INSERT INTO public.silinenyemekhane VALUES ('YEMEKHANE 5', '2020-08-09');


--
-- Data for Name: yemekhane; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.yemekhane VALUES ('YEMEKHANE 1', 'Kemalpaşa Mh., Üniversite Cd. (Kampüs Giriş Kapısı), 54000 Serdivan/Sakarya', 'Yemekhane 1.kat');
INSERT INTO public.yemekhane VALUES ('YEMEKHANE 2', 'Kemalpaşa Mh., Üniversite Cd. (Kampüs Giriş Kapısı), 54000 Serdivan/Sakarya', 'Yemekhane 2.kat');
INSERT INTO public.yemekhane VALUES ('YEMEKHANE 3', 'Kemalpaşa Mh., Üniversite Cd. (Kampüs Giriş Kapısı), 54000 Serdivan/Sakarya', 'Yemekhane 3.kat');
INSERT INTO public.yemekhane VALUES ('YEMEKHANE 4', 'Kemalpaşa Mh., Üniversite Cd. (Kampüs Giriş Kapısı), 54000 Serdivan/Sakarya', 'Yemekhane 4.kat');


--
-- Data for Name: yonetici; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.yonetici VALUES ('y100000001', 'Burak', 'Yücel', '1234');


--
-- Name: fatura_faturano_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.fatura_faturano_seq', 1000117, true);


--
-- Name: kart_kartno_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kart_kartno_seq', 100065, true);


--
-- Name: fatura Fatura_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fatura
    ADD CONSTRAINT "Fatura_pkey" PRIMARY KEY (fatura_no);


--
-- Name: personel Personel_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personel
    ADD CONSTRAINT "Personel_pkey" PRIMARY KEY (personel_no);


--
-- Name: yemekhane Yemekhane_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.yemekhane
    ADD CONSTRAINT "Yemekhane_pkey" PRIMARY KEY (yemekhane);


--
-- Name: yonetici Yonetici_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.yonetici
    ADD CONSTRAINT "Yonetici_pkey" PRIMARY KEY (yonetici_no);


--
-- Name: gise gise_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gise
    ADD CONSTRAINT gise_pkey PRIMARY KEY (fatura_no);


--
-- Name: kart kart_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kart
    ADD CONSTRAINT kart_pkey PRIMARY KEY (kart_no);


--
-- Name: ogrenci ogrenci_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ogrenci
    ADD CONSTRAINT ogrenci_pkey PRIMARY KEY (ogrenci_no);


--
-- Name: ogun ogun_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ogun
    ADD CONSTRAINT ogun_pkey PRIMARY KEY (ogun);


--
-- Name: fki_faturano_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_faturano_fk ON public.gise USING btree (fatura_no);


--
-- Name: fki_kart_fkey; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_kart_fkey ON public.kart USING btree (ogrenci_no);


--
-- Name: fki_katno_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_katno_fk ON public.gise USING btree (kart_no);


--
-- Name: fki_ogun_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_ogun_fk ON public.gise USING btree (ogun);


--
-- Name: ogrenci kart_olustur; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER kart_olustur AFTER INSERT ON public.ogrenci FOR EACH ROW EXECUTE FUNCTION public.kart_olusturma();


--
-- Name: ogrenci ograd_buyuk; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER ograd_buyuk AFTER INSERT ON public.ogrenci FOR EACH ROW EXECUTE FUNCTION public.ogr_ad_buyuk_yapma();


--
-- Name: ogun ogun_sil; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER ogun_sil BEFORE DELETE ON public.ogun FOR EACH ROW EXECUTE FUNCTION public.ogun_silme();


--
-- Name: yemekhane yemekhane_sil; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER yemekhane_sil BEFORE DELETE ON public.yemekhane FOR EACH ROW EXECUTE FUNCTION public.yemekhane_silme();


--
-- Name: gise faturano_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gise
    ADD CONSTRAINT faturano_fk FOREIGN KEY (fatura_no) REFERENCES public.fatura(fatura_no) NOT VALID;


--
-- Name: kart kart_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kart
    ADD CONSTRAINT kart_fkey FOREIGN KEY (ogrenci_no) REFERENCES public.ogrenci(ogrenci_no) NOT VALID;


--
-- Name: kart kart_personel_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kart
    ADD CONSTRAINT kart_personel_fk FOREIGN KEY (son_islem_personel_no) REFERENCES public.personel(personel_no) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: gise katno_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gise
    ADD CONSTRAINT katno_fk FOREIGN KEY (kart_no) REFERENCES public.kart(kart_no) NOT VALID;


--
-- Name: gise ogun_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gise
    ADD CONSTRAINT ogun_fk FOREIGN KEY (ogun) REFERENCES public.ogun(ogun) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: gise yemekhane_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gise
    ADD CONSTRAINT yemekhane_fk FOREIGN KEY (yemekhane) REFERENCES public.yemekhane(yemekhane) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: personel yonetici_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personel
    ADD CONSTRAINT yonetici_fk FOREIGN KEY (yonetici_no) REFERENCES public.yonetici(yonetici_no) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--


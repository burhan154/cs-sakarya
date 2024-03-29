// Import the functions you need from the SDKs you need
import * as firebase from "firebase";
import "firebase/firestore";

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {


  apiKey: "AIzaSyCaiYK09SHcEs1T9e6AQ3_yJlIJPJfmE44",
  authDomain: "react-ec166.firebaseapp.com",
  projectId: "react-ec166",
  storageBucket: "react-ec166.appspot.com",
  messagingSenderId: "475599971513",
  appId: "1:475599971513:web:63aa5fa1e966b5e6326768"

};

// Initialize Firebase
let app;
if (firebase.apps.length === 0) {
  app = firebase.initializeApp(firebaseConfig);
} else {
  app = firebase.app()
}

const db = firebase.database();
const dbfirestore = firebase.firestore();
const auth = firebase.auth();

export { auth , dbfirestore};
export default db;
// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAJq5-XzQwEn5m0kvQcYEMA9BqDqgYoXsw",
  authDomain: "storetracker-laravel.firebaseapp.com",
  projectId: "storetracker-laravel",
  storageBucket: "storetracker-laravel.firebasestorage.app",
  messagingSenderId: "526602763034",
  appId: "1:526602763034:web:15431dc81426f9e0fe4aa3",
  measurementId: "G-ZDNKTX5L6B"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const signUp = document.getElementById('signUpInactive');
const signIn = document.getElementById('signInActive');
const signUpBox = document.getElementById('signUp');
const signInBox = document.getElementById('signIn');

signUp.addEventListener('click', () => { 
	signInBox.style.display="none";
	signUpBox.style.display="initial";
	signUp.style.borderBottom= "2px solid cadetblue";
	signIn.style.borderBottom="0px";
});
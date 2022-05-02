const signUp = document.getElementById('signUpInactive');
const signIn = document.getElementById('signInActive');
const signUpBox = document.getElementById('signUp');
const signInBox = document.getElementById('signIn');
const container = document.getElementById('box');

signUp.addEventListener('click', ()=> 

{ 
	signInBox.style.display="none";
	signUpBox.style.display="initial";
	signUp.style.borderBottom= "2px solid cadetblue";
	signIn.style.borderBottom="0px";
	
}
);


signIn.addEventListener('click', ()=> 

{ 
	signUpBox.style.display="none";
	signInBox.style.display="initial";
	signIn.style.borderBottom= "2px solid cadetblue";
	signUp.style.borderBottom="0px";
}
);
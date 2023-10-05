document.querySelector('.btn-yes').addEventListener('click', function(){
	document.querySelector('.oui').style.display= 'block';
	document.querySelector('.btn-yes').style.display= 'none';
	document.querySelector('.btn-nope').style.display= 'block';

});
document.querySelector('.btn-nope').addEventListener('click', function(){
	document.querySelector('.oui').style.display= 'none';
	document.querySelector('.btn-yes').style.display= 'flex';
	document.querySelector('.btn-nope').style.display= 'none';

});

function ocultar(id) {
	var e = document.getElementById(id);

	e.className = 'hidden';
}

function mostrarsele(value) {

	var a = document.getElementById('Calabozo');
	var b = document.getElementById('San Juan de los Morros');
	var c = document.getElementById('Valle de la Pascua');
	var d = document.getElementById('Zaraza');

	var e = document.getElementById('Unerg Calabozo, Sector Merecurito');
	var h = document.getElementById('Unerg La Pascua, Calle El Paraiso, Centro');
	var i = document.getElementById('Unerg Zaraza, Sector La Pollosa');

	a.className = 'form-control hidden';
	b.className = 'form-control hidden';
	c.className = 'form-control hidden';
	d.className = 'form-control hidden';
	e.className = 'form-control hidden';
	h.className = 'form-control hidden';
	i.className = 'form-control hidden';

	a.disabled = true;
	b.disabled = true;
	c.disabled = true;
	d.disabled = true;
	e.disabled = true;
	h.disabled = true;
	i.disabled = true;

	switch (value){
		case "1":
			a.className = 'form-control show';
			e.className = 'form-control show';

			a.disabled = false;
			e.disabled = false;
		break;

		case "2":
			b.className = 'form-control show';
			b.disabled = false;
		break;

		case "3":
			c.className = 'form-control show';
			h.className = 'form-control show';

			c.disabled = false;
			h.disabled = false;
		break;

		case "4":
			d.className = 'form-control show';
			i.className = 'form-control show';

			d.disabled = false;
			i.disabled = false;
		break;

		default:
			a.className = 'form-control hidden';
			b.className = 'form-control hidden';
			c.className = 'form-control hidden';
			d.className = 'form-control hidden';
			e.className = 'form-control hidden';
			h.className = 'form-control hidden';
			i.className = 'form-control hidden';

			a.disabled = true;
			b.disabled = true;
			c.disabled = true;
			d.disabled = true;
			e.disabled = true;
			h.disabled = true;
			i.disabled = true;
		break;
	}
}

function mostrarsele2(value){
	var f = document.getElementById('Ing. Sistemas, El Castrero, San Juan');
	var g = document.getElementById('Cs. Económicas, El Castrero, San Juan');

	f.className = 'form-control hidden';
	g.className = 'form-control hidden';

	f.disabled = true;
	g.disabled = true;

	switch (value){
		case "2":
			f.className = 'form-control show';
			f.disabled =false;
		break;
		
		case "3":
			g.className = 'form-control show';
			g.disabled = false;
		break;

		default:
			f.className = 'form-control hidden';
			g.className = 'form-control hidden';

			f.disabled = true;
			g.disabled = true;
		break
	}
}

function verificarpass() {
	var pass1 = document.getElementById('password');
	var pass2 = document.getElementById('repassword');

	var alerta = document.getElementById('alert');

	if (pass1.value != pass2.value) {
		alerta.className = 'alert alert-warning show';
	} else {
		alerta.className = 'alert alert-warning hidden';
	}
}
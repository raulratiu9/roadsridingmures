var today = new Date();
var d = new Date()
var weekday = new Array("Duminică", "Luni", "Marți", "Miercuri", "Joi", "Vineri", "Sâmbătă")
var dd = today.getDate();
if (dd < 10) {
    dd = dd;
}
today = weekday[d.getDay()] + ', ' + dd;
document.write(today);
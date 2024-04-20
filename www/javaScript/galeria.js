$(document).ready(iniciar());
function iniciar() {
$("#slider").slick({
    dots: false,
    infinite: true,
    speed: 1200, // velocidad de movimiento
    autoplay: true,
    autoplaySpeed: 3000, // tiempo entre cada cambio
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    pauseOnFocus: false,
    pauseOnHover: false
});
}
// Event pada saat diklik
$(".page-scroll").on('click', function (event) {

    // Ambil isi href
    var tujuan = $(this).attr('href');
    // tangkap elemen yang bersangkutan
    var elemenTujuan = $(tujuan);

    // pindahkan scroll
    $("html").animate({
        scrollTop: elemenTujuan.offset().top - 50
    }, 1000, 'easeInOutQuart')

    event.preventDefault();
    // alert("Was preventDefault() called: " + event.isDefaultPrevented());
})

// Paralax
// event pada saat pertama kali load

$(window).on('load', function () {
    $('.p_Kiri').addClass('p_muncul');
    $('.p_Kanan').addClass('p_muncul');
})

$(window).scroll(function () {
    var window_scroll = $(this).scrollTop();

    // Jumbotron
    $('.jumbotron img').css({
        'transform': 'translate(0px, ' + window_scroll / 6 + '%)'
    })

    $('.jumbotron h1').css({
        'transform': 'translate(0px, ' + window_scroll / 2.3 + '%)'
    })

    $('.jumbotron p').css({
        'transform': 'translate(0px, ' + window_scroll / 1.2 + '%)'
    })

    // Portfolio
    if (window_scroll > $('.portfolio').offset().top - 220) {
        $('.portfolio .thumbnail').each(function (i) {
            setTimeout(function () {
                $('.portfolio .thumbnail').eq(i).addClass('muncul')
            }, 150 * (i + 1));
        })


        // $('.portfolio .thumbnail').addClass('muncul');
    }

    if (window_scroll > $('.support').offset().top - 220) {
        $('.support .thumbnail').each(function (i) {
            setTimeout(function () {
                $('.support .thumbnail').eq(i).addClass('muncul')
            }, 150 * (i + 1));
        })


        // $('.support .thumbnail').addClass('muncul');
    }
})
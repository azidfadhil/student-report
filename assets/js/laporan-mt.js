(function($) {
  "use strict"; // Start of use strict
  $.fn.modal.Constructor.prototype.enforceFocus = function() {};

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  // ============================================== My Custom Script ============================================== //
  
  // ==================== Checkbox show password ==================== //
  $(document).on('change', '#showPassword', function() {
    if ($(this).is(':checked')) {
      $('#inputPassword').attr('type', 'text')
    } else {
      $('#inputPassword').attr('type', 'password')
    }
  })
  $(document).on('change', '#showPasswordEdit', function() {
    if ($(this).is(':checked')) {
      $('#inputPasswordEdit').attr('type', 'text')
    } else {
      $('#inputPasswordEdit').attr('type', 'password')
    }
  })
  
  // ==================== Modal delete user ==================== //
  $(document).on('click', '#btnDeleteUser', function() {
    var id = $(this).data('id')
    $('#btnDeleteUserModal').attr('href', base_url + 'data-user/hapus/' + id)
  })

  // ==================== Select2 Input MT ==================== //
  $('#inputMasterTrainer').select2({
    placeholder: "Pilih MT",
    width: 'resolve',
  })
  
  // ==================== Custom file browser ==================== //
  $(document).on('change', '#inputFilePresensi', function() {
    var filename = $(this).val().replace('C:\\fakepath\\', "")
    $(this).next('.custom-file-label').html(filename)
  })
  
  // ==================== Select2 Input MT ==================== //
  $('#inputEditMasterTrainer').select2({
    placeholder: "Pilih MT",
    width: 'resolve',
  })  

  // ==================== Tooltips Lihat MT ==================== //
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  // ==================== Modal delete presensi ==================== //
  $(document).on('click', '#btnDeletePresensi', function() {
    var id = $(this).data('id')
    $('#btnDeletePresensiModal').attr('href', base_url + 'data-presensi/hapus/' + id)
  }) 

  // ==================== Cek file presensi dirubah atau tidak ==================== //
  var placeholder = $('#placeholderFile').text()
  $(document).on('change', '#inputEditFilePresensi', function() {
    var file_presensi_change = $(this).val()
    if(file_presensi_change) {
      $('#placeholderFile').html(file_presensi_change)
      $('#changeFilePresensi').html('File presensi diganti <i class="fas fa-exclamation-triangle"></i>')
      $('#changeFilePresensi').addClass('text-danger')
      $('#changeFilePresensi').removeClass('text-success')
    } else {
      $('#placeholderFile').html(placeholder)
      $('#changeFilePresensi').html('File presensi tidak diubah <i class="fas fa-check-square">')
      $('#changeFilePresensi').addClass('text-success')
      $('#changeFilePresensi').removeClass('text-danger')
    }
  })

})(jQuery); // End of use strict

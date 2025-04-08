<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   @include('user.inc.header')
   <body>
      <div id="preloader">
         <div class="lds-ripple">
            <div></div>
            <div></div>
         </div>
      </div>
      <div id="main-wrapper">
         @include('user.inc.navbar')
         @include('user.inc.sidebar')
         <div class="content-body">
            <!-- row -->
            <div class="container">
               @section('container')
               @show
            </div>
         </div>
         <audio id="beep" src="{{asset('menu/sound/notification.mp3')}}" autoplay="false"></audio>

         @include('user.inc.footer')
      </div>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="{{asset('user/assets/vendor/global/global.min.js')}}"></script>
      <script src="{{asset('user/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
      <script src="{{asset('user/assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
      <script src="{{asset('user/assets/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
      <script src="{{asset('user/assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
      <script src="{{asset('user/assets/js/dlabnav-init.js')}}"></script>
      <script src="{{asset('user/assets/js/custom.js')}}"></script>
      <script src="{{asset('user/assets/js/demo.js')}}"></script>
      <script src="{{asset('user/assets/js/styleSwitcher.js')}}"></script>
      <script src="{{asset('user/assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('user/assets/js/plugins-init/datatables.init.js')}}"></script>
      <script src="{{asset('user/assets/vendor/toastr/js/toastr.min.js')}}"></script>
      <script src="{{asset('user/assets/js/plugins-init/toastr-init.js')}}"></script>
      <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script>
         // Pusher.logToConsole = true;
         var pusher = new Pusher('bb537a6ca39da059f395', {
            cluster: 'ap2'
      });
      var authenticatedUser = @json(auth()->user());
      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('order-notification-event'+authenticatedUser.id);

      // Bind a function to a Event (the full Laravel class)
      channel.bind('App\\Events\\OrderNotificationEvent', function(data) {
         var sound = document.getElementById("beep");
         sound.play();
         toastr.success(data.message, "Notification", {
                    positionClass: "toast-bottom-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                }),
                Livewire.emit('refreshComponent');
                Livewire.emit('refreshComponentdashboard');
      });
      </script>
      @yield('extra-js')
@livewireScripts
   </body>
</html>
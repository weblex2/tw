<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js' ])
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css"/>
        <script type="text/javascript" src="slick-1.8.1/slick/slick.min.js"></script>

    </head>
    <body>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="interestModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-black bg-opacity-90 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div id="modal-image"></div>
                    </div>
                </div>
            </div>
        </div>



        @php
            $route = Route::current()->uri();
            $opacity = " bg-opacity-100 ";
            if ($route=="/"){
                $opacity = " bg-opacity-100 ";
            }
        @endphp

        <!-- Page Heading -->
        @include('includes.header2')
        {{-- @if (isset($header))
        <header class="w-full bg-white shadow fixed">
            <div class="max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif --}}
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        @include('includes.footer')
        <div class="up">
          <a href="#top"><i class="fa-solid fa-chevron-up text-3xl font-extrabold"></i></a>
        </div>
    </body>

    <script>

        $("a[href='#top']").click(function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
          document.getElementById("dd").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }



        </script>


<script type="text/javascript">

    $(document).ready(function () {
        $('#interestModal').on('click', function(){
            $('#interestModal').addClass('invisible');
        });

        $('.zoomable').on('click', function(e){
            var img = $(this).attr('src');
            $('#modal-image').html("<img src="+img+">");
            $('#interestModal').removeClass('invisible');
        });
        $('.closeModal').on('click', function(e){
            $('#interestModal').addClass('invisible');
        });

        $('.nav-toggle').click(function(){
          $('#menu').toggle();
        })

    });
</script>

</html>

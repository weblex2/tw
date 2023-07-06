<x-guest-layout>
    <div class="main-content">
    <div class="bg-zinc-800">
    <div class="carousel-wrapper">
        <div class="carousel">
            <div><img class="max-w-full w-full h-full bg-cover" src="{{  asset('img/dl/Verein-Ges-Slide-1-scaled.jpg') }}"></div>
            <div><img class="max-w-full w-full h-full" src="{{  asset('img/dl/Team-Slide-2-scaled.jpg') }}"></div>
            <div><img class="max-w-full w-full h-full" src="{{  asset('img/dl/X-Out-Slide-3-scaled.jpg') }}"></div>
        </div>
    </div>


    <div class="w-full max-w-full grid grid-cols-1 lg:grid-cols-3">
        <div class="m m1">
            <div class="grid grid-cols-12 text-white">

            <div  class="col-span-3"><i class="rounded-full icon-big px-10 py-6 fa-solid fa fa-house"></i></div>
            <div class="col-span-9">
                <h1>Hallen</h1>
                <hr class="mb-3">
                <p>Unser Training findet statt in folgenden Hallen</p>
                <br>
                <p>Gemeindehalle Feldkirchen</p>
                <p>Richthofenstrasse 1</p>
                <p>85622 Feldkirchen</p>
                <br>
                <p>Sporthalle Feldkirchen</p>
                <p>Olympiastraße 1</p>
                <p>85622 Feldkirchen</p>

            </div>
            </div>
        </div>

        <div class="m m2">
            <div class="grid grid-cols-12 text-white">
                <div  class="col-span-3"><i class="rounded-full icon-big px-7 py-6 fa-solid fa-calendar-days"></i></div>
                <div class="col-span-9">
                    <h1>TRAININGSZEITEN</h1>
                    <hr class="mb-3">
                    <p>Weitere Informationen zu unseren
                        <a href="http://cheer-base.de/timetable"><strong>Trainingszeiten</strong> </a>
                        finden Sie <a href="http://cheer-base.de/timetable">hier</a>.
                    </p>
                </div>
                </div>
        </div>
        <div class="m m3">
            <div class="grid grid-cols-12 text-white">
                <div  class="col-span-3">
                    <i class="rounded-full icon-big px-7 py-6  fa fa-trophy"></i>
                </div>
                <div class="col-span-9">
                    <h1>AKTUELLE MEISTERSCHAFTEN 2019/2020</h1>
                    <hr class="mb-3">
                    <p>derzeit keine</p>
                </div>
                </div>
        </div>
    </div>

    <div class="index-pic-wrapper">
       <div class="wrapper overflow-hidden m-2">
        <div class="p p1">JUNIORS</div>
       </div>
       <div class="wrapper overflow-hidden m-2">
        <div class="p p2">PEEWEES</div>
       </div>
       <div class="wrapper overflow-hidden m-2">
        <div class="p p3">SENIORS</div>
       </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3">
        <!--div class="bg-white text-center align-middle p-10">
            <div class="text-5xl font-extrabold">107</div>
            <div class="text-3xl">aktive Mitglieder</div>
        </div-->
        <div class="bg-stone-800 text-white text-center align-middle p-10">
            <div class="text-5xl font-extrabold">107</div>
            <div class="text-3xl text-stone-300">Mitglieder</div>
        </div>
        <div class="bg-stone-600 text-white text-center align-middle p-10">
            <div class="text-5xl font-extrabold">2013</div>
            <div class="text-3xl text-stone-300">gegründet</div>
        </div>
        <div class="bg-stone-400 text-white text-center align-middle p-10">
            <div class="text-5xl font-extrabold">3</div>
            <div class="text-3xl text-stone-300">Teams</div>
        </div>
    </div>
    </div>

    </div>

    <script>
    $(document).ready(function(){
        $('.carousel').slick({
           autoplay:true,
           infinite: true,
           arrows: false,
           pauseOnFocus:false,
           pauseOnHover: false,
        });
      });
    </script>
</x-guest-layout>

<x-guest-layout>
    <div class="main-content">
    <div class="bg-zinc-800">
    <div class="carousel-wrapper">
        <div class="carousel">
            <div><img class="max-w-full w-full h-full" src="{{  asset('img/dl/Verein-Ges-Slide-1.jpg') }}"></div>
            <div><img class="max-w-full w-full h-full" src="{{  asset('img/dl/Team-Slide-2.jpg') }}"></div>
            <div><img class="max-w-full w-full h-full" src="{{  asset('img/dl/X-Out-Slide-3.jpg') }}"></div>
        </div>
    </div>


    <div class="w-full max-w-full grid grid-cols-1 lg:grid-cols-3">
        <div class="m m1">
            <div class="grid grid-cols-12 text-white">

            <div  class="col-span-3"><i class="rounded-full icon-big px-10 py-6 fa-solid fa fa-house"></i></div>
            <div class="col-span-9">
                <h1>COMING SOON!!!</h1>
                <p>(wir informieren Euch sobald <br>bestellt werden kann)<br></p>
                <br><h1>Team- u. Fanwear</h1>
                <hr class="mb-3">
                <p>Die neue Team- u. Fanwear kann hier bestellt werden:</p><br>
                <a href="http://www.herzundberg.de"><strong>Shop "Herz und Berg" Textildruck</strong> </a>
            </div>
            </div>
        </div>

        <div class="m m2">

                   <div class="grid grid-cols-12 text-white">
                <div  class="col-span-3">        
                <i class="rounded-full icon-big px-7 py-6 fa-solid fa-calendar-days"></i></div>
                <div class="col-span-9">

                    <h1>Hallen</h1>
                    <hr class="mb-3">
                    <p>Unser Training findet statt in folgenden Hallen statt:</p>
                    <br>
                    <p>Gemeindehalle Feldkirchen</p>
                    <p>Richthofenstrasse 1</p>
                    <p>85622 Feldkirchen</p>
                    <br>
                    <p>Sporthalle Feldkirchen</p>
                    <p>Olympiastraße 1</p>
                    <p>85622 Feldkirchen</p>
                    <br>
                    <br>
                    <h1>TRAININGSZEITEN</h1>
                    <hr class="mb-3">
                    <p>Wir trainieren montags, mittwochs und sonntags.</p><br>

                    <p>Weitere Informationen zu unseren
                        <a href="http://cheer-base.de/training"><strong>Trainingszeiten</strong> </a>
                        finden Sie <a href="http://cheer-base.de/training"><strong>hier</strong></a>.
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
                    <h1>AKTUELLE TERMINE / MEISTERSCHAFTEN 2023/2024</h1>
                    <hr class="mb-3">
                    <h1>2023:</h1>
                    <h4>November</h4>
                    Landesmeisterschaft Ingolstadt - 25.11.2023<br>
                    <br>
                    <h4>Dezember</h4>
                    Nfinity League Nürnberg - 16.12.2023<br>
                    <br>
                    <h1>2024:</h1>
                    <h4>Januar</h4>
                    Neujahrsempfang - 13.01. o. 20.01.2024<br>
                    (Infos folgen)<br>
                    <br>
                    <h4>Februar</h4>
                    Regionalmeisterschaft Göppingen - 10.02.2024<br>
                    <br>
                    <h4>März</h4>
                    Deutsche Meisterschaft Bonn - 16/17.03.2024<br>
                    <br>
                    <h4>Mai</h4>
                    Southern Cheer Classics Haar - 11.05.2024<br>
                    Elite Cheerleading Championship Bottrop - 18.-20.05.2024<br>
                    <br>
                    <h4>Juli</h4>
                    Auftritt Landesgartenschau Kirchheim - 14.07.2024<br>
                    <br>

                </div>
                </div>
        </div>
    </div>

    <div class="index-pic-wrapper">
       <div class="wrapper overflow-hidden m-2">
        <a href="/peewees"><div class="p p1">PEEWEES</div></a>
       </div>
       <div class="wrapper overflow-hidden m-2">
       <div class="p p2">JUNIORS LEVEL 2</div>
       </div>
       <div class="wrapper overflow-hidden m-2">
       <div class="p p3">JUNIORS LEVEL 3</div>
       </div>
       <div class="wrapper overflow-hidden m-2">
       <div class="p p4">SENIORS</div>
       </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4">
        <!--div class="bg-white text-center align-middle p-10">
            <div class="text-5xl font-extrabold">107</div>
            <div class="text-3xl">aktive Mitglieder</div>
        </div-->
        <div class="bg-green-900 text-white text-center align-middle p-10">
            <div class="text-5xl font-extrabold">~100</div>
            <div class="text-3xl text-stone-300">Mitglieder</div>
        </div>
        <div class="bg-green-800 text-white text-center align-middle p-10">
            <div class="text-5xl font-extrabold">2013</div>
            <div class="text-3xl text-stone-300">gegründet</div>
        </div>
        <div class="bg-green-700 text-white text-center align-middle p-10">
            <div class="text-5xl font-extrabold">4</div>
            <div class="text-3xl text-stone-300">Teams</div>
        </div>
        <div class="bg-green-500 text-white text-center align-middle p-10">
            <div class="text-5xl font-extrabold">9</div>
            <div class="text-3xl text-stone-300">Coaches</div>
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

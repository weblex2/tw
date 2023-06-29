<x-guest-layout>
    <div class="bg-zinc-800">
    <div class="carousel-wrapper">
        <div class="carousel">
            <div><img class="max-w-full w-full h-auto" src="{{  asset('img/slide1.jpg') }}"></div>
            <div><img class="max-w-full w-full" src="{{  asset('img/slide2.jpg') }}"></div>
            <div><img class="max-w-full w-full" src="{{  asset('img/slide3.jpg') }}"></div>
            <div><img class="max-w-full w-full" src="{{  asset('img/slide4.jpg') }}"></div>
        </div>
    </div>   
    
    
    <div class="w-full max-w-full grid grid-cols-3">
        <div class="m m1">
            <div class="grid grid-cols-12 text-white">
            <div  class="col-span-3"><i class="text-2xl icon-big  fa-solid fa-person"></i></div>
            <div class="col-span-9">
                <h1>TRAININGSZEITEN</h1>
                <hr class="mb-3">
                <p>Wir trainieren Montags, Mittwochs und Sonntags.</p>
                <p>Weitere Informationen zu unseren Trainingszeiten finden Sie <a href="#">hier</a>.</p>
                <p><img src="{{asset('img/REWE_Scheine-fuer-Vereine_Poster-Story1-397x705.jpg')}}" /></p>
            </div>
            </div>
        </div>    

        <div class="m m2">
            <div class="grid grid-cols-12 text-white">
                <div  class="col-span-3"><i class="icon-big fa fa-house"></i></div>
                <div class="col-span-9">
                    <h1>HALLEN</h1>
                    <hr class="mb-3">
                    <p>Unser Training findet statt in folgenden Hallen</p>
                    <p><b>Gemeinschaftshalle Feldkirchen</b></p>
                    <p>Richthofenstrasse 1</p>
                    <p>85622 Feldkirchen</p>
                    <br>
                    <p><b>Sporthalle Feldkirchen</b></p>
                    <p>Olympiastraße 1</p>
                    <p>85622 Feldkirchen</p>
                </div>
                </div>
        </div>
        <div class="m m3">
            <div class="grid grid-cols-12 text-white">
                <div  class="col-span-3"><i class="icon-big fa fa-trophy"></i></div>
                <div class="col-span-9">
                    <h1>AKTUELLE MEISTERSCHAFTEN 2019/2020</h1>
                    <hr class="mb-3">
                    <p>derzeit keine</p>
                </div>
                </div>
        </div>
    </div>    

    <div class="grid grid-cols-4 gap-4 px-3 mb-3">
       <div class="wrapper overflow-hidden">
        <div class="p p1">PEEWEES</div> 
       </div> 
       <div class="wrapper overflow-hidden">
        <div class="p p2">SENIORS</div>
       </div>
       <div class="wrapper overflow-hidden"> 
        <div class="p p3">JUNIORS ALLGIRL</div>
       </div>
       <div class="wrapper overflow-hidden"> 
       <div class="p p4">JUNIORS COED</div>
       </div>
    </div>   

    <div class="grid grid-cols-3">
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
            <div class="text-5xl font-extrabold">4</div>
            <div class="text-3xl text-stone-300">Teams</div>
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

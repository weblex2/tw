<x-guest-layout>
    <div class="relative content-wrapper bg-[url('../../public/img/Cheerleading.jpg')] bg-cover bg-fixed bg-no-repeat">
        <div class="absolute w-full h-full bg-black bg-opacity-80  z-10"></div>
        <div class="content  max-w-[70%] text-white z-20">
            <div class="grid grid-cols-5 gap-4">
                <div>
                    <h2>IMPRESSUM</h2>
                    <div>Angaben gemäß §5 TMG:</div>
                    <div>Cheer Base Feldkirchen e.V.</div>
                    <div>Wolframstr. 20</div>
                    <div>85652 Pliening</div>
                    <br>
                    <div>Vertreten durch: Christine Puzicha (1. Vorsitzende)</div>
                    <div>Lea Fruhstorfer (2. Vorsitzende)</div>
                    <div>Doreen Wittke (Kassier)</div>
                    <div>Thomas Wittke (Schriftführer / Jugendbeauftragter)</div>
                    <br>
                    <h2>KONTAKT</h2>
                    <div>E-Mail: <a href="mailto:info@cheer-base.com">info@cheer-base.com</a></div>
                    <br>
                    <h2>REGISTEREINTRAG:</h2>
                    <div>Eintragung im Vereinsregister.</div>
                    <div>Registergericht: Amtsgericht München</div>
                    <div>Registernummer: VR 204221</div>
                    <br>
                    <h2>DESIGN/PROGRAMMIERUNG:</h2>
                    <div>no.brand Werbeagentur</div>
                </div>
                <div></div>
                <div class="col-span-3">

                    <div class="contact p-10">
                        <form id="frmContact">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div class="col-span-2"><h1>Kontakt</h1></div>
                                <div><input class="w-full" type="text" name="name" placeholder="Name*"></div>
                                <div><input class="w-full" type="email" name="email" placeholder="Email*"></div>
                                <div class="col-span-2">
                                    <input class="w-full" type="text" name="betreff" placeholder="Betreff*">
                                </div>
                                <div class="col-span-2">
                                    <textarea class="w-full h-25" name="content" rows=10 placeholder="Nachricht*"></textarea>
                                </div>
                                <div class="col-span-2 align-center pt-10">
                                    <a href="/contact" class="btn btn-submit">Senden</a>
                                </div>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

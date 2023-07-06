<x-guest-layout>
    <div class="main-content">
    <div class="relative content-wrapper bg-[url('../../public/img/Cheerleading.jpg')] bg-cover bg-fixed bg-no-repeat">
        <div class="absolute w-full h-full bg-black bg-opacity-80  z-10"></div>
        <div class="content  max-w-[80%] lg:max-w-[70%] text-white z-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

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

                <div>
                    <div class="contact py-5 lg:py-0 lg:px-10">
                        <form id="frmContact" action="" method="">
                            @csrf
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                <div class="lg:col-span-2 relative">
                                    <div class="msg-success">Email wurde verschickt!</div>
                                    <h1>Kontakt</h1>
                                </div>
                                <div><input class="w-full" type="text" id="name" name="name" placeholder="Name*" value="Alex Noppenberger"></div>
                                <div><input class="w-full" type="email" id="email" name="email" placeholder="Email*" value="alex@noppal.de"></div>
                                <div class="lg:col-span-2">
                                    <input class="w-full" type="text" id="subject" name="betreff" placeholder="Betreff*" value="Betreff">
                                </div>
                                <div class="lg:col-span-2">
                                    <textarea class="w-full h-25" id="content" name="content" rows=10 placeholder="Nachricht*">Nachricht bla bla</textarea>
                                </div>
                                <div class="lg:col-span-2 align-center pt-10">
                                    <button type='button' onclick="sendMail()" class="btn btn-submit">Senden</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function hideMessage(){
            $('.msg-success').hide(500);
        }

        function sendMail(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var name      = $('#name').val();
            var email     = $('#email').val();
            var content   = $('#content').val();
            var subject   = $('#subject').val();


            $.ajax({
                type:'POST',
                url:"{{route('sendMail')}}",
                data:{name:name, email:email, subject:subject, body:content},
                success:function(data){
                    $('.msg-success').show();
                    $('#name').val("");
                    $('#email').val("");
                    $('#content').val("");
                    $('#subject').val("");
                    var t = setTimeout(hideMessage, 5000);
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
    </script>
</x-guest-layout>

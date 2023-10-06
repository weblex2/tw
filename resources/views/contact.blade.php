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
                    <div>c/o Christine Puzicha</div>
                    <div>Wolframstr. 20</div>
                    <div>85652 Pliening</div>
                    <br>
                    <div>Vertreten durch: Thomas Wittke (1. Vorsitzender)</div>
                    <div>Lea Fruhstorfer (2. Vorsitzende)</div>
                    <div>Doreen Wittke (Kassier)</div>
                    <div>Marlen Wilhelm (Schriftführer / Jugendbeauftragte)</div>
                    <br>
                    <h2>KONTAKT</h2>
                    <div>E-Mail: <a href="mailto:info@cheer-base.com">info@cheer-base.com</a></div>
                    <br>
                    <h2>REGISTEREINTRAG:</h2>
                    <div>Eintragung im Vereinsregister.</div>
                    <div>Registergericht: Amtsgericht München</div>
                    <div>Registernummer: VR 204221</div>
                    <br>
                    <h2>PROGRAMMIERUNG:</h2>
                    <div>Alexander Noppenberger</div>
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
                                <div><input class="w-full" type="text" id="name" name="name" placeholder="Name*" value="Name*" required></div>
                                <div><input class="w-full" type="email" id="email" name="email" placeholder="Email*" value="E-Mail-Adresse*" required></div>
                                <div class="lg:col-span-2">
                                    <input class="w-full" type="text" id="subject" name="betreff" placeholder="Betreff*" value="Betreff" required>
                                </div>
                                <div class="lg:col-span-2">
                                    <textarea class="w-full h-25" id="content" name="content" rows=10 placeholder="Nachricht*">Ihre Nachricht</textarea>
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
        $(document).ready(function () {
            $('#name,#email, #content, #subject').keyup(function(){
                $(this).removeClass('error');
            });
            $('#name,#email, #content, #subject').click(function(){
                $(this).val("");
            } )
        });


        function hideMessage(){
            $('.msg-success').hide(500);
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
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

            if (name=="") {
                $('#name').addClass('error');
                return false;
            }

            if (email=="") {
                $('#email').addClass('error');
                return false;
            }

            if (content=="") {
                $('#content').addClass('error');
                return false;
            }

            if (subject=="") {
                $('#subject').addClass('error');
                return false;
            }

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

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MEduline</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/layouts/contact.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        
    </head>

    <body>
        <div class="super-container">

            <!--Home-->

            <div class="home">
                <div class="home-background-container prlx-parent">
                    <div class="home-background prlx" style="background-image:url(/images/city.jpg)"></div>
                </div>
                <div class="home-content">
                    <h1>Kapcsolat</h1>
                </div>
            </div>

            <div class="contact">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8">

                            <div class="contact-form">
                                <div class="contact-title">Írj üzenetet</div>

                                <div class="contact-form-container">
                                    <form action="{{ url('kapcsolat') }}" method="POST">
                                        {{csrf_field()}}
                                        <input id="subject" name="subject" class="input-field contact-form-name" type="text" placeholder="Név" required="required" data-error="Kötelező kitölteni!">
                                        <input id="email" name="email" class="input-field contact-form-email" type="email" placeholder="E-mail" required="required" data-error="Hibás email cím!">
                                        <textarea id="message" name="message" class="text-field contact-form-message" name="message" placeholder="Üzenet" required="required" data-error="Hagyj üzenetet."></textarea>
                                        <input type="submit" value="Send Message" class="contact_send_btn">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="about">
                                <div class="about-title">Csatlakozz az oldalhoz</div>
                                <p class="about-text">In a volutpat elit. Quisque vitae ante at orci porta pulvinar quis nec augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas tincidunt non dolor id rhoncus. Etiam in mattis purus. Ut egestas aliquam eros, ac aliquam nunc posuere nec. Morbi ultricies neque ligula, vitae feugiat lacus bibendum vitae.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

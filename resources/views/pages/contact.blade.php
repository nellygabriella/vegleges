@extends('main')
@section('title','|Kapcsolat')
@section('stylesheets')
    {!!Html::style('css/layouts/contact.css')!!}
	
@endsection

@section('content')

    @section('hometitle','Kapcsolat')

            <div class="contact">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8">

                            <div class="contact_form">
                                <div class="contact_title">Írj üzenetet</div>

                                <div class="contact_form_container">
                                    <form action="{{ url('kapcsolat') }}" method="POST">
                                        {{csrf_field()}}
                                        <input id="subject" name="subject" class="input_field contact-form-name" type="text" placeholder="Név" required="required" data-error="Kötelező kitölteni!">
                                        <input id="email" name="email" class="input_field contact-form-email" type="email" placeholder="E-mail" required="required" data-error="Hibás email cím!">
                                        <textarea id="message" name="message" class="text_field contact-form-message" name="message" placeholder="Üzenet" required="required" data-error="Hagyj üzenetet."></textarea>
                                        <input type="submit" value="Küldés" class="contact_send_btn">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="about">
                                <div class="about_title">Csatlakozz az oldalhoz</div>
                                <p class="about_text">In a volutpat elit. Quisque vitae ante at orci porta pulvinar quis nec augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas tincidunt non dolor id rhoncus. Etiam in mattis purus. Ut egestas aliquam eros, ac aliquam nunc posuere nec. Morbi ultricies neque ligula, vitae feugiat lacus bibendum vitae.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </body>
</html>

@endsection

@section('scripts')
{!!Html::script('js/custom.js')!!}
@endsection

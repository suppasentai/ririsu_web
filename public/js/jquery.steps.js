$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
    
    $("#nextCompany").click(function(e){
        
        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var title = $("input[name='title']").val();
        var representative_name = $("input[name='representative_name']").val();
        var identification_code = $("input[name='identification_code']").val();
        var tel = $("input[name='tel']").val();
        var location = $("input[name='location']").val();
        var email = $("input[name='email']").val();
        var url = $("input[name='url']").val();
        var employees_number = $("input[name='employees_number']").val();
        var capital_stock = $("input[name='capital_stock']").val();
        var incorp_date = $("input[name='incorp_date']").val();


        $.ajax({
            url: "/companies/create_step1",
            type:'POST',
            data: {
                _token:_token,
                title:title, 
                representative_name:representative_name, 
                identification_code:identification_code, 
                tel:tel,
                location:location, 
                incorp_date:incorp_date, 
                email:email, 
                url:url,
                employees_number:employees_number, 
                capital_stock:capital_stock,
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msg").css('display','none');
                    current_fs = $("#nextCompany").parent();
                    next_fs = $("#nextCompany").parent().next();
                    
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    
                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                    step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    
                    current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                    },
                    duration: 500
                    });
                    setProgressBar(++current);
                    // console.log(data.success)
                }else{
                    printErrorMsg(data.error);
                }
            }
        });
    });

    $("#nextUser").click(function(e){
        
        e.preventDefault();

        //COMPANY INFO
        var _token = $("input[name='_token']").val();
        var title = $("input[name='title']").val();
        var representative_name = $("input[name='representative_name']").val();
        var identification_code = $("input[name='identification_code']").val();
        var tel = $("input[name='tel']").val();
        var location = $("input[name='location']").val();
        var email = $("input[name='email']").val();
        var url = $("input[name='url']").val();
        var employees_number = $("input[name='employees_number']").val();
        var capital_stock = $("input[name='capital_stock']").val();
        var incorp_date = $("input[name='incorp_date']").val();

        //USER INFO
        var _token = $("input[name='_token']").val();
        var first_name = $("input[name='first_name']").val();
        var last_name = $("input[name='last_name']").val();
        var telephone = $("input[name='telephone']").val();
        var user_email = $("input[name='user_email']").val();
        var password = $("input[name='password']").val();
        var password_confirmation = $("input[name='password_confirmation']").val();


        $.ajax({
            url: "/companies/create_step2",
            type:'POST',
            data: {
                _token:_token,
                //user
                first_name:first_name, 
                last_name:last_name, 
                telephone:telephone, 
                user_email:user_email,
                password:password, 
                password_confirmation:password_confirmation,
                //company
                title:title, 
                representative_name:representative_name, 
                identification_code:identification_code, 
                tel:tel,
                location:location, 
                incorp_date:incorp_date, 
                email:email, 
                url:url,
                employees_number:employees_number, 
                capital_stock:capital_stock,
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msg").css('display','none');

                    $("#header_control").load(" #header_control>*","");

                    // msg = '<div class="col-md-4 col-sm-3" id="header_control">
                    //     <ul class="social-icons">
                    //         @guest
                    //         <li>
                    //             <b><a href="{{route('create_step1')}}">{{__('Request Release')}}</a></b>
                    //         </li>
                    //         &nbsp;
                    //         <li>
                    //             <b><a href="#" data-toggle="modal" data-target="#loginModal">{{__('Login')}}</a></b>
                    //         </li>
                    //         @else
                    //         <li>
                    //             <a href="{{ route('my_account')}}" role="button">
                    //                 <b>{{ __('My Profile') }} <span class="caret"></span></b>
                    //             </a>
                    //         </li>
                    //         <li>
                    //             <b><a href="{{ route('logout') }}"
                    //                 onclick="event.preventDefault();
                    //                                 document.getElementById('logout-form').submit();">
                    //                 {{ __('Logout') }}
                    //             </a></b>

                    //             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    //                 @csrf
                    //             </form>
                    //         </li>
                    //         @endguest
                    //     </ul>
                    // </div>';

                    // $("#header_control").fadeOut(800, function(){
                    //     $("#header_control").html(msg).fadeIn().delay(2000);

                    // });

                    
                    
                    current_fs = $("#nextUser").parent();
                    next_fs = $("#nextUser").parent().next();
                    
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    
                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                    step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    
                    current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                    },
                    duration: 500
                    });
                    setProgressBar(++current);
                    console.log(data.success)
                }else{
                    printErrorMsg(data.error);
                }
            }
        });
    });
    
    $(".previous").click(function(){
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();
    
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(--current);
    });
    
    function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
    .css("width",percent+"%")
    }
    
    $(".submit").click(function(){
    return false;
    })
    
    });
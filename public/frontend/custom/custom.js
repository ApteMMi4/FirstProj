$(document).ready(function(){

  console.log('Custom js loaded. Ready');

  $('.popup__close').click(function(){
    $(this).parent().parent().removeClass('active');
  });

  $('#paycode_check_btn').click(function(){

    let _paycode_id = $('#paycode_id').val();

    $.ajax
     ({
       url: "/cabinet/paycodes/json/showByCode",
       type:'post',
       data: {
         paycode_id: _paycode_id,
         action_type: 'show',
         status: 0,
       },
       headers:
       {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
       },
       dataType:'json',
       success: function(data)
       {
         $('.top-up-tr-modal').addClass('active');

         if(data.paycode != 'fail')
         {
           $('.pc1').text('Код активный');
           $('.pc2').text('Код: ' + data.paycode_id);
           $('.pc3').text('Номинал: ' + data.paycode_amount);
           $('.pc4').text('Дата создания: ' + data.paycode_created_at);
         }
         else
         {
           $('.pc1').text('Код не найден или заблокирован');
           $('.pc2').text('');
           $('.pc3').text('');
           $('.pc4').text('');
         }

       },
     });

  });

  $('#paycode_activate_btn').click(function(){

    let _paycode_id = $('#paycode_id').val();

    $.ajax
     ({
       url: "/cabinet/paycodes/json/showByCode",
       type:'post',
       data: {
         paycode_id: _paycode_id,
         action_type: 'redeem',
         status: 0,
       },
       headers:
       {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
       },
       dataType:'json',
       success: function(data)
       {
         $('.top-up-tr-modal').addClass('active');

         if(data.paycode != 'fail')
         {
           $('.pc1').text('Код активирован');
           $('.pc2').text('Код: ' + data.paycode_id);
           $('.pc3').text('Номинал: ' + data.paycode_amount + ' зачислен на ваш баланс');
           $('.pc4').text('Дата создания: ' + data.paycode_created_at);
         }
         else
         {
           $('.pc1').text('Код не найден или заблокирован');
           $('.pc2').text('');
           $('.pc3').text('');
           $('.pc4').text('');
         }

       },
     });

  });

  $('#create_paycode_btn').click(function(){

    $('#paycode_amount_field').removeClass('error');
    $('#paycode_user_to_field').removeClass('error');

    let _paycode_currency = 'UAH';
    let _paycode_amount = $('#paycode_amount_field').val();
    let _paycode_user_id_to = $('#paycode_user_to_field').val();

    if(parseFloat(_paycode_amount) > 0 && _paycode_amount != '')
    {
      $.ajax
       ({
         url: "/cabinet/paycodes/json/storeAuthJson",
         type:'post',
         data: {
           paycode_currency: _paycode_currency,
           paycode_amount: _paycode_amount,
           user_id_to: _paycode_user_id_to,
         },
         headers:
         {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataType:'json',
         success: function(data)
         {

           if(data.paycode == 'user_not_found')
           {
             $('.top-up-tr-modal').addClass('active');

             $('.pc1').text('Пользователь с указанным ником не найден');
             $('.pc2').text('');
             $('.pc3').text('');
             $('.pc4').text('');

             //alert('Пользователь с указанным ником не найден');
             $('#paycode_user_to_field').addClass('error');
           }
           else
           {
             if(data.paycode == 'user_no_money')
             {
               $('.top-up-tr-modal').addClass('active');

               $('.pc1').text('Недостаточно средств на счёту для создания промокода');
               $('.pc2').text('');
               $('.pc3').text('');
               $('.pc4').text('');
               //alert('Недостаточно средств на счёту для создания промокода');
             }
             else
             {
               $('.top-up-tr-modal').addClass('active');

               $('.pc1').text('Код создан');
               $('.pc2').text('');
               $('.pc3').text('');
               $('.pc4').text('');

               history.go(0);
             }

           }
         },
       });
    }
    else
    {
      $('.top-up-tr-modal').addClass('active');

      $('.pc1').text('Сумма должна быть больше ноля');
      $('.pc2').text('');
      $('.pc3').text('');
      $('.pc4').text('');

      //alert('Сумма должна быть больше ноля');
      $('#paycode_amount_field').addClass('error');
    }



  });

  $('.paycode_copy').click(function(){

    $(this).addClass('clicked');

    let value = $(this).data('code');
    var tempInput = document.createElement("input");
    tempInput.style = "position: absolute; left: -1000px; top: -1000px";
    tempInput.value = value;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

  });

  $("form.paycode_main").submit(function(event) {
    event.preventDefault();
    let _amount = $('#main_page_sum').val();
    let _email  = $('#main_page_email').val();
    console.log(_amount + ' ' + _email);
  });


});

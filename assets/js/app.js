$('#donateButton').on('click', function(){
  console.log('clicked');
  $.post('./api/microdonate',
    { amount: $('#amountToDonate').text(), email: $('input[name="email"]').val(), password: $('input[name="pwd"]').val() },
     function(){
      alert("Donation successful!");
    });
});

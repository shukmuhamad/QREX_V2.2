$('.decimal').keypress(function(evt){
    return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
});

// Sum Defect Values
$(function(){
    // Sum Total Defect Value
    $().mask('#,###.##',{reverse : true});
    
    var total_defect=function(){
        var sum=0;
        sum = parseInt($('#total_minor').val()) + parseInt($('#total_major').val()) + parseInt($('#total_critical').val()) + 
            parseInt($('#total_holes1').val()) + parseInt($('#total_holes2').val()) + parseInt($('#total_holes3').val())

        if(sum <= $('#sample_size').val() || sum <= $('#sample_size_apt').val()) {
            $('#total_defect').val(sum)
        } else {
            $('.amount').each(function(){
                $(this).val('');
            });

            $('.amount2').each(function(){
                $(this).val('');
            });

            $('.amount3').each(function(){
                $(this).val('');
            });

            $('.amount4').each(function(){
                $(this).val('');
            });

            $('.amount5').each(function(){
                $(this).val('');
            });

            $('.amount6').each(function(){
                $(this).val('');
            });

            $('#sample_size').val('');
            $('#sample_size_apt').val('');
            $('#total_minor').val(0);
            $('#total_major').val(0);
            $('#total_critical').val(0);
            $('#total_holes1').val(0);
            $('#total_holes2').val(0);
            $('#total_holes3').val(0);
            $('#total_defect').val(0);
            $('.defect-btn').attr('disabled', true);

            $("#errorModal").modal();
            console.log(sum);
            console.log($('#sample_size').val());
        }
        ;
    }

    // Sum Total Minor
    $().mask('#,###.##',{reverse : true});
    
    var total_minor=function(){
        var sum=0;
        $('.amount').each(function(){
            var num =$(this).val().replace(',', '');

            if(num != 0){
                sum+=parseInt(num);
            }
        });
        $('#total_minor').val(sum);
    }

    $('.amount').keyup(function(){
        total_minor();
        total_defect();
    });

    // Sum Total Major
    $().mask('#,###.##',{reverse : true});

    var total_major=function(){
        var sum=0;
        $('.amount2').each(function(){
                var num =$(this).val().replace(',','');
                if(num !=0){
                    sum+=parseInt(num);
                }
        });
        $('#total_major').val(sum);
    }

    $('.amount2').keyup(function(){
        total_major();
        total_defect();
    });

    // Sum Total Critical
    $().mask('#,###.##',{reverse : true});

    var total_critical=function(){
        var sum=0;
        $('.amount3').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_critical').val(sum);
    }

    $('.amount3').keyup(function(){
        total_critical();
        total_defect();
    });

    // Sum Total Holes 1
    $().mask('#,###.##',{reverse : true});

    var total_holes1=function(){
        var sum=0;
        $('.amount4').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_holes1').val(sum);
    }
    $('.amount4').keyup(function(){
        total_holes1();
        total_defect();
    });

    // Sum Total Holes 2
    $().mask('#,###.##',{reverse : true});

    var total_holes2=function(){
        var sum=0;
        $('.amount5').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_holes2').val(sum);
    }
    $('.amount5').keyup(function(){
        total_holes2();
        total_defect();
    });

    // Sum Total Holes 3
    $().mask('#,###.##',{reverse : true});
        var total_holes3=function(){
        var sum=0;
        $('.amount6').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_holes3').val(sum);
    }
    $('.amount6').keyup(function(){
        total_holes3();
        total_defect();
    });
});

// Enable button only when sample size is entered
$(document).ready(function(){
    if($('#sample_size_apt').val().length != 0 && $('#sample_size').val().length != 0)
        $('.defect-btn').attr('disabled', false);            
    else
        $('.defect-btn').attr('disabled', true);

    $('#sample_size').keyup( function(){
        if($(this).val().length != 0 && $('#sample_size_apt').val().length != 0)
            $('.defect-btn').attr('disabled', false);            
        else
            $('.defect-btn').attr('disabled', true);
    })
    $('#sample_size_apt').keyup( function(){
        if($(this).val().length != 0 && $('#sample_size').val().length != 0)
            $('.defect-btn').attr('disabled', false);            
        else
            $('.defect-btn').attr('disabled', true);
    })


    // Grand total defect
    $().mask('#,###.##',{reverse : true});
    
    var total_defect=function(){
        var sum=0;
        sum = parseInt($('#total_minor').val()) + parseInt($('#total_major').val()) + parseInt($('#total_critical').val()) + 
            parseInt($('#total_holes1').val()) + parseInt($('#total_holes2').val()) + parseInt($('#total_holes3').val())

        if(sum <= $('#sample_size').val() || sum <= $('#sample_size_apt').val()) {
            $('#total_defect').val(sum)
        } else {
            $('.amount').each(function(){
                $(this).val('');
            });

            $('.amount2').each(function(){
                $(this).val('');
            });

            $('.amount3').each(function(){
                $(this).val('');
            });

            $('.amount4').each(function(){
                $(this).val('');
            });

            $('.amount5').each(function(){
                $(this).val('');
            });

            $('.amount6').each(function(){
                $(this).val('');
            });

            $('#sample_size').val('');
            $('#sample_size_apt').val('');
            $('#total_minor').val(0);
            $('#total_major').val(0);
            $('#total_critical').val(0);
            $('#total_holes1').val(0);
            $('#total_holes2').val(0);
            $('#total_holes3').val(0);
            $('#total_defect').val(0);
            $('.defect-btn').attr('disabled', true);

            $("#errorModal").modal();
            console.log(sum);
            console.log($('#sample_size').val());
        }
    };

    // Initialize all total defect
    $().mask('#,###.##',{reverse : true});
        var total_minor=function(){
        var sum=0;
        $('.amount').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_minor').val(sum);
    }

    $().mask('#,###.##',{reverse : true});
        var total_major=function(){
        var sum=0;
        $('.amount2').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_major').val(sum);
    }

    $().mask('#,###.##',{reverse : true});
        var total_critical=function(){
        var sum=0;
        $('.amount3').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_critical').val(sum);
    }

    $().mask('#,###.##',{reverse : true});
        var total_holes1=function(){
        var sum=0;
        $('.amount4').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_holes1').val(sum);
    }

    $().mask('#,###.##',{reverse : true});
        var total_holes2=function(){
        var sum=0;
        $('.amount5').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_holes2').val(sum);
    }

    $().mask('#,###.##',{reverse : true});
        var total_holes3=function(){
        var sum=0;
        $('.amount6').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_holes3').val(sum);
    }
    

    total_minor();
    total_major();
    total_critical();
    total_holes1();
    total_holes2();
    total_holes3();
    total_defect();
});
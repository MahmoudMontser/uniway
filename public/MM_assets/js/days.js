var 
  days = [
    {name: 'Sunday', abbr: 'Sun'},
    {name: 'Monday', abbr: 'Mon'},
    {name: 'Tuesday', abbr: 'Tues'},
    {name: 'Wednesday', abbr: 'Wed'},
    {name: 'Thursday', abbr: 'Thur'},
    {name: 'Friday', abbr: 'Fri'},
    {name: 'Saturday', abbr: 'Sat'}
  ],
  weekday = ['1', '2', '3', '4', '5'],
  weekend = ['0', '6'],
  hours = [],
  minute_blocks = [],
  minutes = [],
  from_placeholder = 'Open from: 08:00 am',
  to_placeholder = 'Till: 05:00 pm',
  invalid_notice = 'Invalid Time';

var i = 0,
    total = 1439,
    hour = 0,
    hour_display = 12;
    minute = 0,
    am_pm = 'am',
    time = '',
    time_obj = {};

for( i; i<=total; i++ ) {
    
  if( minute >= 60 ) {
    hour++;
    hour_display = hour_display + 1;
    minute = 0;
  }
  
  if( hour == 1 ) {
    hour_display = 1;
  }
    
  if( hour > 11 ) {
    am_pm = 'pm';
  }
  
  if( hour_display > 12 && am_pm == 'pm' ) {    
    hour_display = hour_display - 12;
  }
  
  time = zero_pad(hour_display) + ':' + zero_pad(minute) + ' ' + am_pm;
  
  time_obj = {
      label: time,
      value: time,
      min: i 
  };
  
  if( minute == 0) {  
    hours.push(time_obj);
    
    minute_blocks.push(time_obj);
    
  } else  {
        
    if( minute%10 == 0 ) minute_blocks.push(time_obj);
    
    minutes.push(time_obj)
  }
    
  minute++;
}

console.log( hours, minutes, minute_blocks)

$('.hours-selector .selected.to').attr('placeholder', to_placeholder);
$('.hours-selector .selected.from').attr('placeholder', from_placeholder);

function create_hours_selector() {
  
  $( ".hours-selector .selected" )
  .on('focus', function(event) {
          
      if( $(this).attr('placeholder') == invalid_notice ) {
        $(this).attr('placeholder', '').removeClass('error');  
      }
    
    })
  .on('blur', function() {
    
      if( $(this).val() == '' ) {

        if( $(this).hasClass('to') ) {
          $(this).attr('placeholder', to_placeholder);
        } else if( $(this).hasClass('from') ) {
          $(this).attr('placeholder', from_placeholder);
        }
   
      }
  })
  .autocomplete({
    
    autoFocus: true,
    source: hours,
    change: function(event, ui) { 
              
      // Not a valid time, show an error
      if( $.inArray(ui.item, hours) < 0 && $.inArray(ui.item, minutes) < 0) {
        $( this ).val('').attr('placeholder', invalid_notice).addClass('error');
      }
      
    },
    select: function(event, ui) {
      // Store the minute value of the selcted time
      $(this).attr('data-selected', ui.item.min).val(ui.item.value);
    },
    search: function(event, ui) {
      
      var filter = '';
      
      var val = $(event.currentTarget).val(), 
          colon_index = val.indexOf(':');
      
      if( colon_index > -1 ) { // Has a colon so looking for minutes
        
        if( val.substring(colon_index).length > 1 ) {
          $( ".hours-selector .selected" ).autocomplete('option', 'source', minutes);
        } else if( colon_index == val.length - 1 ) {
          $( ".hours-selector .selected" ).autocomplete('option', 'source', minute_blocks);
        }
        
      }
       
      
      // Only Allow A Later time for the to: time select, based on the from: time
      
      var updated_source = [];
      
      if( $(this).hasClass('to') ) {
        var from_time = $('.hours-selector .selected.from').attr('data-selected');
        
        if( typeof from_time == 'undefined' ) return;
                
        var source = $( ".hours-selector .selected.from" ).autocomplete('option', 'source'),
            starting_index = 0;
                
        $.each(source, function(index, item) {
          if( item.min > from_time ) {
            starting_index = index;
            return false;
          }
        });
        
        updated_source = source.slice(starting_index);
        
      } 
      
      // Only Allow an earlier time for the from: time select, based on the to: time
      
      if( $(this).hasClass('from') ) {
         
        var to_time = $('.hours-selector .selected.to').attr('data-selected');
        
        if( typeof to_time == 'undefined' ) return;
               
        var source = $( ".hours-selector .selected.to" ).autocomplete('option', 'source'),
            ending_index = 0;
        
        console.log( source );
        
        $.each(source, function(index, item) {
          if( item.min > to_time ) {
            ending_index = index - 1;
            return false;
          }
        });
                
        updated_source = source.slice(0, ending_index);
        
      } 
        
      console.log( $(this).hasClass('from'), updated_source );
      
      $( this ).autocomplete('option', 'source', updated_source);
        
      
    },
    close : function() { 
      $( ".hours-selector .selected" ).autocomplete('option', 'source', hours);
    }
    });
  
}

create_hours_selector();

function create_day_selector() {
  
  var options = '';
  $.each(days, function(index, val) {

    options += '<div class=option data-id='+index+'>';
    options += '<span>'+val.name+'</span>';
    options += '</div>';

    $('.day-selector .options').html(options);

  });
  
  // Create the selected array and listen for change to display the selection
  $('.day-selector .dropdown').data('selected', []); //.on('hours-selected', show_selection);

  $('.day-selector .option').click(function() {

    // Set that the option is selected, or remove it

    var selected = $('.dropdown').data('selected'),
        id = $(this).attr('data-id'),
        index = selected.indexOf( id );

    if( index > -1 ) {
      $(this).removeClass('active');
      selected.splice(index, 1); 
    } else {
      selected.push(id);
      $(this).addClass('active');
    }

    show_selection();

  });

  $('.day-selector .selected').click(function() {

    var select = $('.day-selector .select').toggle();

    if( select.is(':hidden') ) {
      $('.day-selector .dropdown').trigger('hours-selected');
    }

  });

  $('body').keydown(function(event) {
    if( event.which == 27 || event.which == 13 || event.which == 9 ) close_selector(); 
  })

  $(document).mouseup(function(event) { 

    if( $(event.target).parents('.day-selector').length == 0 ) close_selector();

  });
  
}

create_day_selector();

function get_abbr(index) {
  
  var the_index = index;
  
  if( typeof the_index == 'string' ) the_index = parseInt(index);
  
  return days[the_index].abbr;
}

function show_selection() {
  var selected = $('.day-selector .dropdown').data('selected').sort(),
      groups = [];
      
  var prev, 
      group,
      selected_count = selected.length,
      display_text = '',
      group_text = '',
      group_text_end = '',
      group_seperator = ', ',
      block_seperator = '-';
      
  if( selected_count == 7 ) display_text = 'Every day';
  else if( array_compare(selected, weekday) ) display_text = 'Weekdays';
  else if( array_compare(selected, weekend) ) display_text = 'Weekends';
  else {

    $.each(selected, function(index, val) {

      if(  prev && (prev == 0 && parseInt(val) == 1) || parseInt(val) - prev == 1 ) {
       
        // Get the end of the grouping
        group_text_end = get_abbr(val);

      } else {

        // The end of the grouping, unset group text end & add it to the main display text
        if( group_text_end != '' ) {
          group_text += block_seperator + group_text_end;
          group_text_end = '';
          if( display_text.length > 0 ) display_text += ', ';
          display_text += group_text;
          group_text = '';
        }

        // Only a single day, add to the main display text
        if( group_text != '' && group_text_end == '') {
          if( display_text.length > 0 ) display_text += group_seperator;
          display_text += group_text;
          group_text = '';
        }

        // Setup for the next grouping check         
        group_text = get_abbr(val);
      } 

      // Make sure the last grouping gets added
      if( index == selected_count - 1 ) {
        
        // Needs a seperator if not the first item
        if( display_text.length > 0 ) display_text += group_seperator;  
        
        // Grouping so need the seperator
        if( group_text_end != '' ) group_text += block_seperator + group_text_end;  

        display_text += group_text;     
      }

      prev = parseInt(val);

    });

  }     
    
  $('.day-selector .selected').html(display_text);
  
}

function close_selector() {
  $('.day-selector .select').hide();
  $('.day-selector .dropdown').trigger('hours-selected');
}

function array_compare(a1, a2){
    return !(a1.sort() > a2.sort() || a1.sort() < a2.sort());
}

function zero_pad(val) {
  if( val < 10 ) return '0' + val;
  else return val;
}
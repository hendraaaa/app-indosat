//ajax async false tidak diperbolehkan sama sekali namun eror deprecated akan muncul di console 
//$.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });

/* Create currency renderer */
jQuery.fn.dataTable.render.setCur = function ( cur, countrycode ) {
	return function ( data, type, row ) {
		var intVal = function ( i ) {
		   //return typeof i === 'string' ? i.replace(/[\Rp,]/g, '')*1 : typeof i === 'number' ? i : 0;
		   return typeof i === 'string' ? i*1 : typeof i === 'number' ? i : 0;
		};
		bil = intVal(data);
		var currencyOptions = {style: 'currency', currency: cur , minimumSignificantDigits: 1, maximumSignificantDigits: 4 };//2: 1.750.000 dibulatkan ke 1.800.000
		return bil.toLocaleString(countrycode, currencyOptions);
	}
};
/* Create new cutoff renderer for data in datatables */
jQuery.fn.dataTable.render.cutOff = function ( num ) {
	return function ( data, type, row ) {
		if ( type === 'display' ) {
			var str = data.toString(); // cast numbers
			return str.length < num ? str : str.substr(0, num-1) +'&#8230;';
		}
		return data;
	};
};

//remove passive false violation to passive true
jQuery.event.special.touchstart = {
  setup: function( _, ns, handle ){
    if ( ns.includes("noPreventDefault") ) {
      this.addEventListener("touchstart", handle, { passive: false });
    } else {
      this.addEventListener("touchstart", handle, { passive: true });
    }
  }
};
jQuery.event.special.touchmove = {
  setup: function( _, ns, handle ){
    if ( ns.includes("noPreventDefault") ) {
      this.addEventListener("touchmove", handle, { passive: false });
    } else {
      this.addEventListener("touchmove", handle, { passive: true });
    }
  }
};
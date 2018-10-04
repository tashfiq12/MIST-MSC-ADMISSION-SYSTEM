
function validate()
{ 
  
   if ( ( document.personalreg.gender[0].checked == false ) && ( document.personalreg.gender[1].checked == false ) )
   {
   alert ( "Please choose your Gender: Male or Female" );
   return false;
   }   
   if( document.personalreg.Relegion.value == "-1" )
   {
     alert( "Please provide your Relegion!" );
     return false;
   }   
   if( document.personalreg.Blood.value == "-1" )
   {
     alert( "Please provide your Blood!" );
    
     return false;
   }
    if( document.personalreg.Program.value == "-1" )
   {
     alert( "Please provide the program name!" );
    
     return false;
   }
   if( document.personalreg.Martial.value == "-1" )
   {
     alert( "Please provide martial status!" );
    
     return false;
   }
   
    if( document.personalreg.Student_type.value == "-1" )
   {
     alert( "Please provide your student type!" );
    
     return false;
   }


    
   
   
 


 
   return true;
}
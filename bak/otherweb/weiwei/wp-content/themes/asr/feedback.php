<?php 
/*
Template Name:feedback 
*/
get_header();?>
        <!---top--->
       <div class="net_banner">
    <?php echo "<p>Feedback </p>";?></div>
    
    <!----content--->
    <div class="content clearfloat">
    	<div class="left fl">
        	<h3>CONTACT US</h3>
            <UL>
            	<li><a href="<?php echo get_bloginfo("url")?>/contact-us">联系我们</a></li>
                <li><a href="<?php echo get_bloginfo("url")?>/feedback">在线咨询</a></li>
           
            </UL>
        </div>
  <div class="case fl">
        	<h2>Feedback</h2>
            <div class="case_word">
      				<script language="JavaScript">
var Href=window.location.href;
function chk(theForm){
        if (theForm.name.value == ""){
                alert("* Name required!");
                theForm.name.focus();
                return (false);
        }
		 if (theForm.tel.value == ""){
                alert("* Tel Required!");
                theForm.tel.focus();
                return (false);
        }
		
		if(theForm.mail.value == "")
		{
			alert('* Mail Required!');
			theForm.mail.focus();
			return false;
		}
		if(theForm.message.value == "")
		{
			alert('* Message Required!');
			theForm.message.focus();
			return false;
		}
		document.getElementById("classid").value = this.Href;
	
}

function isEmail(strEmail)   
  {   
  if(strEmail)  
{
  if (strEmail.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)!= -1)   
  return true;   
  else   
  alert("Mailbox format is wrong!"); 
  return false;
}  
}

</script> 

<FORM id="submitform" name="submitform" action="<?php echo  get_bloginfo("template_url")?>/tijiao.php" method="post" onSubmit="return chk(submitform);" target="_blank">
         <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
    <TR>
      <TD height="18" align=left class=font02>
    
    </TR>
    <TR>
      <TD height="18" align=left class=font02>
    </TR>
    <TR>
      <TD vAlign=top>
        
            <TABLE cellSpacing=1 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                      <TBODY>
                        <TR>
                          <TD height=356><TABLE class=fz cellSpacing=0 cellPadding=0 width="100%" 
                        align=center border=0>
                              <TBODY>
                                <TR>
                                  <TD class=smalltitle vAlign=center align=left 
                            width="120"><SPAN 
                              style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none">Name： </SPAN></TD>
                                  <TD align=left colSpan=3 height=30><SPAN 
                              class=file><FONT color=#ff0000><B>
                                    <INPUT 
                              name=name>
                                  </B></FONT></SPAN><SPAN class=XX><FONT 
                              color=#ff0000>*</FONT> </SPAN></TD>
                                </TR>
                                <TR>
                                  <TD 
                            style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none" 
                            vAlign=center align=left width="120"><SPAN 
                              class=large>Company：</SPAN></TD>
                                  <TD width="269" height=30 align=left><SPAN class=large>
                                    <INPUT 
                              name=company>
                                  <SPAN class=XX><FONT 
                              color=#ff0000></FONT> </SPAN></SPAN></TD>
                                  <TD width=42 colSpan=2>&nbsp;</TD>
                                </TR>
                                <TR>
                                  <TD 
                            style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none" 
                            vAlign=center align=left width="120"><SPAN 
                              class=large>Telphone：</SPAN></TD>
                                  <TD align=left colSpan=3 height=30><SPAN 
                              class=file>
                                    <INPUT size=35 name=tel onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                  </SPAN><SPAN 
                              class=XX><FONT color=#ff0000>*</FONT> </SPAN></TD>
                                </TR>
                                <TR>
                                  <TD 
                            style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none" 
                            vAlign=center align=left width="120"><SPAN 
                              class=large>Fax：</SPAN></TD>
                                  <TD align=left colSpan=3 height=30><SPAN 
                              class=file></SPAN><SPAN class=file>
                                    <INPUT 
                              name="fax" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                  </SPAN><SPAN 
                              class=file></SPAN><SPAN class=file></SPAN></TD>
                                </TR>
                                <TR>

                                  <TD 
                            style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none" 
                            vAlign=center align=left width="120" 
                              height=29><SPAN class=large>E-MAIL：</SPAN></TD>
                                  <TD align=left colSpan=3 height=29><SPAN 
                              class=file>
                                    <INPUT name="mail" onBlur="isEmail(this.value)">
                                  <SPAN class=XX><FONT 
                              color=#ff0000>*</FONT> </SPAN></SPAN></TD>
                                </TR>
                                <TR>
                                  <TD 
                            style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none" 
                            vAlign=center align=left width="120"><SPAN 
                              class=large>Address：</SPAN></TD>
                                  <TD align=left colSpan=3 height=30><SPAN 
                              class=file>
                                    <INPUT name="address">
                                  </SPAN><SPAN 
                              class=XX><FONT color=#ff0000></FONT> </SPAN></TD>
                                </TR>
                                <TR>
                                  <TD 
                            style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none" 
                            vAlign=center align=left width="120" 
                              height=30><SPAN class=large>Zip code：</SPAN></TD>
                                  <TD align=left colSpan=3 height=30><span 
                              class=large>
                                    <input size=30 name="code">
                                  </span></TD>
                                </TR>
                                <TR>
                                  <TD 
                            style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none; "  
                            vAlign=center align=left width="120" 
                              height=30><SPAN class=large>Message：</SPAN></TD>
                                  <TD align=left colSpan=3 height=30><span 
                              class=large>
                                    <textarea name="message" cols="30" rows="8"></textarea>
                                    <span 
                              class="file"> </span><span 
                              class="XX"><font color="#ff0000">*</font></span></span></TD>
                                </TR>
                                <TR vAlign=center>
                                  <TD align=left colSpan=4><DIV align=center>
                                      <TABLE class=unnamed1 cellPadding=4 width="40%" 
                              align=center border=0>
                                        <TBODY>
                                          <TR>
                                            <TD width=49>&nbsp;</TD>
                                            <TD width=151 height=50><DIV align=center><SPAN class=large>
                                                <INPUT id=button1 style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none"  type="submit" value="Submit" name=submit>
                                            </SPAN></DIV></TD>
                                            <TD width=143><DIV align=center><SPAN class=large>
                                                <INPUT style="FONT-SIZE: 12px; LINE-HEIGHT: 24px; TEXT-DECORATION: none" type=reset value="Reset " name=submit2 button2>
                                            </SPAN></DIV></TD>
                                          </TR>
                                        </TBODY>
                                      </TABLE>
                                  </DIV></TD>
                                </TR>
                                <TR vAlign=center>
                                  <TD align=left colSpan=4>&nbsp;</TD>
                                </TR>
                              </TBODY>
                          </TABLE></TD>
                        </TR>
                      </TBODY>
                  </TABLE></TD>
                </TR>
              </TBODY>
            </TABLE>
         </TD>
    </TR>
  </TBODY>
</TABLE>
 </FORM>

            	
            </div>
            
    
        
      </div>
      
    
    
    </div>
	
        
        
<!---bg--->
      


<!---contact--->
<?php get_footer();?>
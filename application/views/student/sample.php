<form class="form-horizontal" role="form" id='login' method="post" action="answer.php">   
  <?php 
  $email=$_SESSION['usr_id'];

  $res = mysqli_query($dbo,"select * from questions where email=' $email '") or die(mysql_error());
  $rows = mysqli_num_rows($res);

  $i=1;
  while($result=mysqli_fetch_array($res)){  
      ?>
      <?php if($i==1){?>         
        <div id='question<?php echo $i;?>' class='cont'>
            <p class='questions' id="qname<?php echo $i;?>"></p>
            <input type="hidden"  name="qname<?php echo $i;?>" value="<?php echo $result['question'];?>"> <?php echo $i?>.<?php echo $result['question'];?>
            <br/>
            <input type="radio" required value="<?php echo $result['opt1'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt1'];?>
            <br/>
            <input type="radio" required value="<?php echo $result['opt2'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt2'];?>
            <br/>
            <input type="radio" required value="<?php echo $result['opt3'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt3'];?>
            <br/>
            <input type="radio" required value="<?php echo $result['opt4'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt4'];?>
            <br/>
            <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
            <br/>
            <button id='<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
        </div>     

    <?php }elseif($i<1 || $i<$rows){?>

     <div id='question<?php echo $i;?>' class='cont'>
        <p class='questions' id="qname<?php echo $i;?>"></p>
        <input type="hidden"  name="qname<?php echo $i;?>" value="<?php echo $result['question'];?>"> <?php echo $i?>.<?php echo $result['question'];?>
        <br/>
        <input type="radio" value="<?php echo $result['opt1'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt1'];?>
        <br/>
        <input type="radio" value="<?php echo $result['opt2'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt2'];?>
        <br/>
        <input type="radio" value="<?php echo $result['opt3'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt3'];?>
        <br/>
        <input type="radio" value="<?php echo $result['opt4'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt4'];?>
        <br/>
        <br/><input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
        <br/>
        <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
        <button id='<?php echo $i;?>' class='next btn btn-success' type='button' >Next</button>
    </div>





<?php }elseif($i==$rows){?>
    <div id='question<?php echo $i;?>' class='cont'>
        <p class='questions' id="qname<?php echo $i;?>"></p>  
        <input type="hidden" name="qname<?php echo $i;?>" value="<?php echo $result['question'];?>" > <?php echo $i?>.<?php echo $result['question'];?>
        <br/>
        <input type="radio" value="<?php echo $result['opt1'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt1'];?>
        <br/>
        <input type="radio" value="<?php echo $result['opt2'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt2'];?>
        <br/>
        <input type="radio" value="<?php echo $result['opt3'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt3'];?>
        <br/>
        <input type="radio" value="<?php echo $result['opt4'];?>" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['opt4'];?>
        <br/>
        <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
        <br/>
        <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
        <button id='<?php echo $i;?>' name="submit" class='next btn btn-success' type='submit'>Finish</button>
    </div>



    <script>
       <script>
       $('.cont').addClass('hide');
       count=$('.questions').length;
       $('#question'+1).removeClass('hide');

       $(document).on('click','.next',function(){
           last=parseInt($(this).attr('id'));     
           nex=last+1;
           $('#question'+last).addClass('hide');

           $('#question'+nex).removeClass('hide');
       });

       $(document).on('click','.previous',function(){
           last=parseInt($(this).attr('id'));     
           pre=last-1;
           $('#question'+last).addClass('hide');

           $('#question'+pre).removeClass('hide');
       });        
   </script>
</script>
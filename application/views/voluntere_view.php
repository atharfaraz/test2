<html language="en">
    <head>
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="<?php echo(CSS.'admhome.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo(CSS.'redmond/jquery-ui-1.10.3.custom.css'); ?>" />
         <script src="<?php echo(JS.'jq/jquery-1.9.1.js'); ?>"></script>
        <script src="<?php echo(JS.'jq/jquery-ui-1.10.3.custom.js'); ?>"></script>
      
        <script type="text/javascript">
           $(document).ready( 
            function ()
            {   /* To colour the alternating table rows*/
                $("thead").addClass("thead");
                $("tr:odd").addClass("tr_odd");
                $("tr:even").addClass("tr_even");
            });
         </script>
    </head>
    <body>
         <div class="container_fill">
        <br>
        <br>
        <br>
        <form name="f1" action=<?php echo URL."index.php/voluntere/" ?> method="post">
            <p align="center"><?php if(isset($title)) echo $title; ?></p>
            <table align="center">
            <thead>
               <tr><td colspan="3" align="center"><?php if(isset($errormsg)) echo $errormsg; ?>Qurbani 2013</td></tr>
            </thead>
                <tr>
                    <td>Select Loaction </td><td><select name="place">
                            <option value="">-Select a location-</option>
                            <option value="BIJAPUR">BIJAPUR</option>
                            <option value="DHARWAD">DHARWAD</option>
                        </select></td>
                    <td colspan="2"><input type="submit" value="List Shares"></td>
                </tr>
        </table>
        </form>
        <?php if(isset($result))
        {?>
        <table align="center">
            <thead><tr><td>SlCode</td><td>Name</td><td>Status</td></tr></thead>
            <tbody>
                
            <?php
            foreach ($result as $row)
            echo '<tr><td>'.$row->SlNo.'</td><td>'.$row->Name.'</td><td>'.$row->Status.'</td></tr>';
            ?>    
                <tr><td colspan="3">  
       <?php echo "<div align='center'>Total Shares : ".  sizeof($result)." </div>"; }?>
            </td></tr>
            </tbody>
        </table>
         </div>
                </body>
</html>
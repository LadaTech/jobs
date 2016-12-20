<?php
    class Pagination
    {
    public function page($sql,$p,$name,$db)
    {
       $rs=$db->query($sql);
       $pages=  $rs->rowCount();
        $c=$pages/$p;
       $c= ceil($c);
       if(isset($_GET['page']))
       {
           $p1=$_GET['page'];
       }
       else
       {
           $p1=0;
       }
       if($c>1)
       {
        if($p1<=$c)
        {
       if($c<=3)
           $f=$c;
       else
           $f=3;
       if($c<=3)
           $b=0;
       else
           $b=2;
        if(!isset($_GET['page']))
        {
                        if(!isset($_GET['page'])) {
                    ?>
                       <li><a class="current">First </a></li>
                    <?php
                    for($i=2;$i<=$f;$i++)
                    {

                     echo "<li><a href=".$name."/page-$i.aspx>$i </a></li>";  
                    }
                     echo "<li><a href=".$name."/page-$c.aspx>Last</a></li>";
                    }
        }
        else 
             if($_GET['page']==1) {
                    ?>
                       <li><a class="current">First </a></li>
                    <?php
                    for($i=2;$i<=$f;$i++)
                    {

                     echo "<li><a href=page-$i.aspx>$i </a></li>";  
                    }
                     echo "<li><a href=page-$c.aspx>Last</a></li>";
                    }
        else 
             if($_GET['page']==$c)
        {
        ?>
        <li><a href="page-1.aspx">First</a> </li>
        <?php
        for($i=($_GET['page']-$b);$i<$_GET['page'];$i++)
        {
         echo "<li><a href=page-$i.aspx>$i  </a>";  
        }
         echo "<li><a class='current'>Last</a></li>";
        }
        else
        {
          ?>
        <li><a href="page-1.aspx">First</a> </li>
        <?php
        for($i=($_GET['page']-1);$i<=($_GET['page']+1);$i++)
        {
         if($_GET['page']==$i)
         {
             echo "<li><a class='current'>".$i."</a></li>";
         }
         else
         {
         echo "<li><a href=page-$i.aspx>$i  </a></li>";  
         }
        }
         echo "<li><a href=page-$c.aspx>Last</a></li>";   
        }
       }
       
       else
       {
           echo 'no Results';
       }
       }
    }
    public function page1($sql,$p,$name,$db)
    {
       $rs=$db->query($sql);
       $pages=  $rs->rowCount();
        $c=$pages/$p;
       $c= ceil($c);
       if(isset($_GET['page']))
       {
           $p1=$_GET['page'];
       }
       else
       {
           $p1=0;
       }
       if($c>1)
       {
        if($p1<=$c)
        {
       if($c<=3)
           $f=$c;
       else
           $f=3;
       if($c<=3)
           $b=0;
       else
           $b=2;
        if(!isset($_GET['page']) || $_GET['page']==1)
        {
        ?>
          <li><a class="current">First </a></li>
        <?php
        for($i=2;$i<=$f;$i++)
        {
        
         echo "<li><a href=".$name."&page-$i.aspx>$i </a></li>";  
        }
         echo "<li><a href=".$name."&page-$c.aspx>Last</a></li>";
        }
        else 
             if($_GET['page']==$c)
        {
        ?>
       <li> <a href="<?php echo $name;?>&page-1.aspx">First</a> </li>
        <?php
        for($i=($_GET['page']-$b);$i<$_GET['page'];$i++)
        {
         echo "<li><a href=".$name."&page-$i.aspx>$i  </a></li>";  
        }
         echo "<li><a class='current'>Last</a></li>";
        }
        else
        {
          ?>
      <li> <a href="<?php echo $name;?>&page-1.aspx">First</a></li> 
        <?php
        for($i=($_GET['page']-1);$i<=($_GET['page']+1);$i++)
        {
         if($_GET['page']==$i)
         {
             echo "<li><a class='current'>".$i."</a></li>";
         }
         else
         {
         echo "<li><a href=".$name."&page-$i.aspx >$i</a></li>";  
         }
        }
         echo "<li><a href=".$name."&page-$c.aspx>Last</a></li>";   
        }
       }
       
       else
       {
           echo 'no Results';
       }
       }
    }
     public function page2($sql,$p,$name,$db)
    {
       $rs=$db->query($sql);
       $pages=  $rs->rowCount();
        $c=$pages/$p;
       $c= ceil($c);
       if(isset($_GET['page']))
       {
           $p1=$_GET['page'];
       }
       else
       {
           $p1=0;
       }
       if($c>1)
       {
        if($p1<=$c)
        {
       if($c<=3)
           $f=$c;
       else
           $f=3;
       if($c<=3)
           $b=0;
       else
           $b=2;
        if(!isset($_GET['page']) || $_GET['page']==1)
        {
        ?>
           <span>First</span>  1 |
        <?php
        for($i=2;$i<=$f;$i++)
        {
        
         echo "<a href=".$name."page-$i.aspx>$i | </a>";  
        }
         echo "<a href=".$name."page-$c.aspx><span>Last</span></a>";
        }
        else 
             if($_GET['page']==$c)
        {
        ?>
        <a href="<?php echo $name;?>page-1.aspx"><span>First</span></a> 
        <?php
        for($i=($_GET['page']-$b);$i<$_GET['page'];$i++)
        {
         echo "<a href=".$name."page-$i.aspx>$i  | </a>";  
        }
         echo " $c <span>Last</span>";
        }
        else
        {
          ?>
       <a href="<?php echo $name;?>page-1.aspx"><span>First</span></a> 
        <?php
        for($i=($_GET['page']-1);$i<=($_GET['page']+1);$i++)
        {
         if($_GET['page']==$i)
         {
             echo $i." | ";
         }
         else
         {
         echo "<a href=".$name."page-$i.aspx>$i  | </a>";  
         }
        }
         echo "<a href=".$name."page-$c.aspx><span>Last</span></a>";   
        }
       }
       
       else
       {
           echo 'no Results';
       }
       }
    }
   
    }
    $obj=new Pagination();
    
       ?>

<?php
/* Loop Starts Here */
/*
 * batch
 * 
 */
if ($loop_page == 'industry') {
    ?>
    <?php
    if ($rs->rowCount() == '0') {
        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {
        while ($res = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		
            <tr>
                <td><?php echo $res['name']; ?></td>
                <td width="300px"> 
                <!--    <a href="view_jobs.php?uid=<?php echo $res['id']; ?>"><i class="fa fa-list-alt"></i> View</a>&nbsp;&nbsp;&nbsp;-->
                    <a href="edit_industry.php?uid=<?php echo $res['id']; ?>"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;
                    <a href="delete_hub.php?pname=industry&uid=<?php echo $res['id']; ?>"  onclick="javascript:return confirm('Do you want Delete This?');"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php
        }
    }
}
/*
 *  End batch
 */
/*
 * domains
 * 
 */
if ($loop_page == 'domains') {
    ?>
    <?php
    if ($rs->rowCount() == '0') {
        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {
        while ($res = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		
            <tr>
                <td><?php echo $res['name']; ?></td>
                <td><?php echo $res['i_name']; ?></td>
                <td width="300px"> 
                <!--    <a href="view_jobs.php?uid=<?php echo $res['id']; ?>"><i class="fa fa-list-alt"></i> View</a>&nbsp;&nbsp;&nbsp;-->
                    <a href="edit_domains.php?uid=<?php echo $res['id']; ?>"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;
                    <a href="delete_hub.php?pname=domains&uid=<?php echo $res['id']; ?>"  onclick="javascript:return confirm('Do you want Delete This?');"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php
        }
    }
}
/*
 *  End City
 */
/*
 * job_seeker
 * 
 */
if ($loop_page == 'job_seeker') {
    if ($rs->rowCount() == '0') {
        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {

        while ($res = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		

            <tr>



                <td><?php echo $res['First_name'] . " " . $res['Last_name']; ?></td>

                <td><?php echo $res['Email_id']; ?></td>

                <td><?php echo $res['Experience_level']; ?></td>

                <td><div class="onoffswitch">

                        <input type="checkbox" data-value="<?php echo $res['Job_Seeker_Id']; ?>"  name="onoffswitch" class="onoffswitch-checkbox myonoffswitch" id="myonoffswitch<?php echo $res['Job_Seeker_Id']; ?>"
            <?php
            if ($res['status'] == "1") {

                echo "checked";
            }
            ?>>

                        <label class="onoffswitch-label" for="myonoffswitch<?php echo $res['Job_Seeker_Id']; ?>">

                            <div class="onoffswitch-inner"></div>

                            <div class="onoffswitch-switch"></div>

                        </label></div>

                </td>

                <td width="300px">
                <!--    <a href="view_jobs.php?uid=<?php echo $res['Job_Seeker_Id']; ?>"><i class="fa fa-list-alt"></i> View</a>&nbsp;&nbsp;&nbsp;-->

                    <a href="edit_jobseeker.php?uid=<?php echo $res['Job_Seeker_Id']; ?>"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;

                    <a href="delete_hub.php?pname=jobseeker&uid=<?php echo $res['Job_Seeker_Id']; ?>"  onclick="javascript:return confirm('Do you want Delete This?');"><i class="fa fa-trash"></i> Delete</a>

                </td>

            </tr>

            <?php
        }
    }
}

/*

 *  End job_seeker

 */



/*

 *  Content Writers

 *
 */

if ($loop_page == 'cw') {
    ?>

    <?php
    if ($rs->rowCount() == '0') {

        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {

        while ($res = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		

            <tr>



                <td><?php echo $res['First_name'] . " " . $res['Last_name']; ?></td>

                <td><?php echo $res['Email_id']; ?></td>

                <td><?php echo $res['exp_yrs'] . " Years " . $res['exp_mnths'] . " Months "; ?></td>

                <td><div class="onoffswitch">

                        <input type="checkbox" data-value="<?php echo $res['Content_writer_id']; ?>"  name="onoffswitch" class="onoffswitch-checkbox myonoffswitch" id="myonoffswitch<?php echo $res['Content_writer_id']; ?>"
            <?php
            if ($res['status'] == "1") {

                echo "checked";
            }
            ?>>

                        <label class="onoffswitch-label" for="myonoffswitch<?php echo $res['Content_writer_id']; ?>">

                            <div class="onoffswitch-inner"></div>

                            <div class="onoffswitch-switch"></div>

                        </label></div>

                </td>

                <td width="300px">
                <!--    <a href="view_jobs.php?uid=<?php echo $res['Content_writer_id']; ?>"><i class="fa fa-list-alt"></i> View</a>&nbsp;&nbsp;&nbsp;-->

                    <a href="edit_cw.php?uid=<?php echo $res['Content_writer_id']; ?>"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;

                    <a href="delete_hub.php?pname=cw&uid=<?php echo $res['Content_writer_id']; ?>"  onclick="javascript:return confirm('Do you want Delete This?');"><i class="fa fa-trash"></i> Delete</a>

                </td>

            </tr>

                        <?php
                    }
                }
            }

            /*

             *  End Content Writers

             */





            /*

             * template

             *
             */

            if ($loop_page == 'template') {
                ?>

    <?php
    if ($rs->rowCount() == '0') {

        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {

        while ($res = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		

            <tr>

                <td><img src="../images/templates/<?php echo $res['image1']; ?>" alt="" width="100px"/></td>

                <td><?php echo $res['name']; ?></td>

                <td><?php echo $res['iname']; ?></td>
                 <td><?php echo $res['dname']; ?></td>    
                <td width="140px">
                <!--    <a href="view_jobs.php?uid=<?php echo $res['id']; ?>"><i class="fa fa-list-alt"></i> View</a>&nbsp;&nbsp;&nbsp;-->

                    <a href="edit_template.php?uid=<?php echo $res['id']; ?>"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;

                    <a href="delete_hub.php?pname=template&uid=<?php echo $res['id']; ?>"  onclick="javascript:return confirm('Do you want Delete This?');"><i class="fa fa-trash"></i> Delete</a>

                </td>

            </tr>

            <?php
        }
    }
}

/*

 *  End template

 */



/*

 * bookings

 *
 */

if ($loop_page == 'bookings') {
    ?>

    <?php
    if ($rs->rowCount() == '0') {

        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {

        while ($res = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		

            <tr>

                <td><?php echo $res['sname']; ?></td>   
                <td><?php echo $res['oid']; ?></td>

                <td><?php echo $res['flight_id']; ?></td>

                <td><?php echo date("d-M-Y", strtotime($res['flight_date'])); ?></td>

                <td><?php echo $res['fly_from']; ?></td>

                <td><?php echo $res['departure_time']; ?></td>

                <td><?php echo $res['fly_to']; ?></td>

                <td><?php echo $res['arrival_time']; ?></td>

                <td><?php echo $res['name']; ?></td>

                <td><?php echo $res['price_class']; ?></td>

                <td><?php echo $res['tickets']; ?></td>

                <td><i class="fa fa-rupee"></i> <?php echo $res['price']; ?></td>

                <td><i class="fa fa-rupee"></i> <?php echo $res['total']; ?></td>

            <!--<td>

            <a href="<?php echo $my_path; ?>/order-<?php echo $res['oid']; ?>/delete-order.html"  onclick="javascript:return confirm('Do you want Delete This?');"><i class="fa fa-trash"></i> Delete</a>

            </td>-->

            </tr>

            <?php
        }
    }
}

/*

 *  End bookings

 */



/*

 * enquiries

 *
 */

if ($loop_page == 'enquiries') {
    ?>

    <?php
    if ($rs->rowCount() == '0') {

        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {

        while ($row_dom = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		

            <tr>

                <td><a class="jspreview" data-rid="<?php echo $row_dom["jid"]; ?>"><?php echo $row_dom["jname"]; ?></a></td>
                <td><a class="cwpreview" data-rid="<?php echo $row_dom["cwid"]; ?>"><?php echo $row_dom["cwname"]; ?></a></td>
                <td><?php echo $row_dom["iname"]; ?></td>
                <td><?php echo $row_dom["dname"]; ?></td>
                <td><?php echo $row_dom["ptype"]; ?></td>
                <td><?php echo $row_dom["exp_years"] . "Years " . $row_dom["exp_mnths"] . "Months "; ?></td>

                <td><?php echo date("d M Y h:i A", strtotime($row_dom["created_on"])); ?></td><td class="<?php echo $row_dom["approve"]; ?>"><?php echo $row_dom["approve"]; ?></td>

            </tr>

            <?php
        }
    }
}

/*

 *  End enquiries

 */



/*

 * invitations

 *
 */

if ($loop_page == 'invitations') {
    ?>

    <?php
    if ($rs->rowCount() == '0') {

        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {

        while ($row_dom = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		

            <tr>
<td><a class="cwpreview" data-rid="<?php echo $row_dom["cwid"]; ?>"><?php echo $row_dom["cwname"]; ?></a></td>
                <td><a class="jspreview" data-rid="<?php echo $row_dom["jid"]; ?>"><?php echo $row_dom["jname"]; ?></a></td>
                

                <td><?php echo date("d M Y h:i A", strtotime($row_dom["created_on"])); ?></td><td class="<?php echo $row_dom["approve"]; ?>"><?php echo $row_dom["approve"]; ?></td>

            </tr>

            <?php
        }
    }
}

/*

 *  End invitations

 */


/*
 * Chat
 *
 */

if ($loop_page == 'chat') {
    ?>

    <?php
    if ($rs->rowCount() == '0') {

        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {

        while ($row_dom = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		

            <tr>

                <td><a class="jspreview" data-rid="<?php echo $row_dom["jid"]; ?>"><?php echo $row_dom["jname"]; ?></a></td>
                <td><a class="cwpreview" data-rid="<?php echo $row_dom["cwid"]; ?>"><?php echo $row_dom["cwname"]; ?></a></td>
                <td><?php echo $row_dom["msg"]; ?></td>

                <td><?php echo date("d M Y h:i A", strtotime($row_dom["created_on"])); ?></td>

            </tr>

            <?php
        }
    }
}
/*
 *  End Chat
 */

/*
 * payments
 *
 */

if ($loop_page == 'payments') {
    ?>

    <?php
    if ($rs->rowCount() == '0') {

        echo "<tr><td colspan='4'><p class='alert alert-danger alert-dismissable'>Sorry no information found</p></td></tr>";
    } else {

        while ($row_dom = $rs->fetch(PDO::FETCH_ASSOC)) {
            ?>		

            <tr>
                <td><a class="jspreview" data-rid="<?php echo $row_dom["jsid"]; ?>"><?php echo $row_dom["First_name"]; ?></a></td>
                <td><?php echo $row_dom["rtype"]; ?></td>
                <td><a class="cwpreview" data-rid="<?php echo $row_dom["cwid"]; ?>"><?php echo $row_dom["cw_name"]; ?></a></td>           
                <td><?php echo $row_dom["txn_id"]; ?></td>
                <td><?php echo $row_dom["payment_status"]; ?></td>
                <td><?php echo $row_dom["mc_currency"]." ".$row_dom["payment_gross"]; ?></td>
                <td><?php echo date("d M Y h:i A", strtotime($row_dom["created_on"])); ?></td>

            </tr>

            <?php
        }
    }
}
/*
 *  End payments
 */

?>
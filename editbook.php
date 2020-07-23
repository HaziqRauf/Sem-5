<?php
session_start();
if(isset($_SESSION['admin']))
{
include 'config/config.php';
	$id=$_GET['user_id'];

	?>
<html>
    <head>
        <title>E-LIBRARY</title>
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">

        <style>


        	.dcontent
        	{
        		color: black;
        		
        		 
        		 margin-top: 0px;
                 margin-bottom: 100px;
				 margin-right: 20px;
				 margin-left: 20px;
				 float: left;
			     padding: 20px;
				 width: 70%;
				 background-color: (rgba(255,0,0,0.2));
				 height: 300px;



        	}
      



        </style>

    </head>
    <header style="background-image: url(images/book2.jpg);">
    	<div class="header">
              <h2>E-LIBRARY</h2>
              <p style="font-size: 18px">Library Management Online System  <button href="logout.php">Logout</button> </p>
              
        </div>
    </header>

  <body>
<section>
<nav>
  <center>	
	<div class="content" >
			<ul>
				<br><br>
				<li><img src="images/book4.png" width="150"></li>
				<li><a href="dashboard.php">  Dashboard</a></li>
				<li><a href="books.php">Books</a></li>
				<li><a href="users.php" >Users</a></li>
				<li><a href="bookIssued.php">Book Issued</a></li>
				<li><a href="bookReturned.php">Book Returned</a></li>	
			</ul>
	</div>
</center>
</nav>

<style>
	.box-add
	{
    position: absolute;
    top: 64%;
    left: 55%;
    width: 400px;
    transform:translate(-50%,-50%);
    background: rgba(233, 61, 74, 0.5);
    padding: 40px;
    border-radius: 9px;
    
	}
	.box-add h2
	{   
    text-align: center;
    padding: 0px;
    font-family: Segoe UI Symbol;
    color: white;
	}
	.box-add .inputBox
	{
	position: relative;
	}
	.box-add .inputBox input
	{
	    
	    width: 100%;
	    padding: 10px 0;
	    font-size: 16px;
	    border-bottom: 1px solid #fff;
	    font-family: Segoe UI Symbol;
	    
	}
	.box-add .inputBox label
	{
	 color: white;   
	}
	.box-add input[type="submit"] 
	{
	    background: transparent;
	    border: none;
	    color: #fff;
	    margin-top:10px;
	    font-size: 16px;
	    font-family: Segoe UI Symbol;
	    background: black;
	    padding: 10px 20px;
	    border-radius: 5px;
	    cursor: pointer;
	}
	.box-add input[type="button"] 
	{
	    background: transparent;
	    border: none;
	    color: #fff;
	    margin-top:10px;
	    font-size: 16px;
	    font-family: Segoe UI Symbol;
	    background: black;
	    padding: 10px 20px;
	    border-radius: 5px;
	    cursor: pointer;
	    left: 20px;
	}

	.box-add button 
	{
	    color: white;
	    
	    left: 500px;
	    background: transparent;
	    border: none;
	    color: #ED5565;
	    margin-top:10px;
	    font-size: 16px;
	    font-family: Segoe UI Symbol;
	    background: white;
	    padding: 10px 20px;
	    border-radius: 5px;
	    cursor: pointer; 
	}
</style>

<div class="dcontent">  
	
                <div class="box-add">
                    <h2><img src="images/iconbook5.png" width="40" height="40" style="background:white">EDIT BOOK DETAILS </h2>
            
		<?php
        $con = $mysql;
        mysqli_select_db($con,'libman');
        $sql = "select * from books WHERE id='$id'";
        $records = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($records))
            {?>
                    <form action="processUpdateBook.php" method="POST" >
                <div class="inputBox">
                    <table cellpadding="4" >

<?php echo "<input type=text name=id value='".$id."' hidden>;"?>
<tr>
<td width="78"><B>Book Name</B></td>
<td width="6">:</td>
<td width="294"><?php echo "<input type=text name=name value='".$row['name']."'>"?></td>
</tr>
<tr>
<td><B>Description</B></td>
<td>:</td>
<td><?php echo "<input type=text name=desc value='".$row['description']."'>"?></td>
</tr>
<tr>
<td width="78"><B>Author</B></td>
<td width="6">:</td>
<td width="294"><?php echo "<input type=text name=author value='".$row['author']."'>"?></td>
</tr>
<tr>
<td width="78"><B>Genre</B></td>
<td width="6">:</td>
<td width="294"><?php echo "<input type=text name=genre value='".$row['genre']."'>"?></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr></table>
                  
                    
                </div>
                <center><input type="submit" value="Save"> <a href="books.php"><input type="button" value="Back"></a></center>

                </form>
                <?php
			}
            ?>
        </div>
             

   
 
   </div>


</section>
</body>


 

</html>

<?php
	}
else
{
	echo "<script>location.href='admin_login.php'</script>";
}
?>
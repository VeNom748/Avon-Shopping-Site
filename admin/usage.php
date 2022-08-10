<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Untitled Document</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
    <div class="report" id="report">
    <h1 style="text-align:center;color:red">Welcome To AVON shop</h1>

	<?php

    class ReportGenerator
    {
        public $mysql_resource;
        public $header;
        public $foolter;
        public $fields = array();
        public $cellpad;
        public $cellspace;
        public $border;
        public $width;
        public $modified_width;
        public $header_color;
        public $header_textcolor;
        public $header_alignment;
        public $body_color;
        public $body_textcolor;
        public $body_alignment;
        public $surrounded;
        
        public function generateReport()
        {
            $this->border = (empty($this->border))?"1":$this->border;
            $this->cellpad = (empty($this->cellpad))?"1":$this->cellpad;
            $this->cellspace = (empty($this->cellspace))?"2":$this->cellspace;
            $this->width = (empty($this->width))?"80%":$this->width;
            $this->header_color = (empty($this->header_color))?"#FFFFFF":$this->header_color;
            $this->header_textcolor = (empty($this->header_textcolor))?"#000000":$this->header_textcolor;
            $this->header_alignment = (empty($this->header_alignment))?"left":$this->header_alignment;
            $this->body_color = (empty($this->body_color))?"#FFFFFF":$this->body_color;
            $this->body_textcolor = (empty($this->body_textcolor))?"#000000":$this->body_textcolor;
            $this->body_alignment = (empty($this->body_alignment))?"left":$this->body_alignment;
            $this->surrounded = (empty($this->surrounded))?false:true;
            $this->modified_width = ($this->surrounded==true)?"100%":$this->width;
            
            //echo "modified_width : ".$this->modified_width."<br>";
          
            
            /*
            * Lets calculate how many fields are there in supplied resource
            * and store their name in $this->fields[] array
            */
            
            $field_count = mysqli_num_fields($this->mysql_resource);
            $i = 0;
            
            while ($i < $field_count) {
                $field = mysqli_fetch_field($this->mysql_resource);
                $this->fields[$i] = $field->name;
                $this->fields[$i][0] = strtoupper($this->fields[$i][0]);
                $i++;
            }
            
            
            /*
            * Now start table generation
            * We must draw this table according to number of fields
            */
       
            
            echo "<h1 style='text-align:center;'>Report On Orders</h1>";
            
            echo "<b><i>".$this->header."</i></b>";
            echo "<P></P>";
            
            //Check If our table has to be surrounded by an additional table
            //which increase style of this table
            if ($this->surrounded == true) {
                echo "<table width='$this->width'  border='1' cellspacing='0' cellpadding='0'><tr><td>";
            }
                
            echo "<table width='$this->modified_width'  border='$this->border' cellspacing='$this->cellspace' cellpadding='$this->cellpad'>";
            echo "<tr bgcolor = '$this->header_color'>";
            
            //Header Draw
            for ($i = 0; $i< $field_count; $i++) {
                //Now Draw Headers
                echo "<th align = '$this->header_alignment'><font color = '$this->header_textcolor'>&nbsp;".$this->fields[$i]."</font></th>";
            }
    
            echo "</tr>";
            
            //Now fill the table with data
            while ($rows = mysqli_fetch_row($this->mysql_resource)) {
                echo "<tr align = '$this->body_alignment' bgcolor = '$this->body_color'>";
                for ($i = 0; $i < $field_count; $i++) {
                    //Now Draw Data
                    echo "<td><font color = '$this->body_textcolor'>&nbsp;".$rows[$i]."</font></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            
            if ($this->surrounded == true) {
                echo "</td></tr></table>";
            }

            echo "<h1 style='text-align:center;'>Thank You....</h1>";
        }
    }

    $prg = new ReportGenerator();
    $prg->width = "100%";
    $prg->cellpad = "0";
    $prg->cellspace = "0";
    $prg->border = "0";
    $prg->header_color = "#666666";
    $prg->header_textcolor="#FFFFFF";
    $prg->body_alignment = "left";
    $prg->body_color = "#CCCCCC";
    $prg->body_textcolor = "#800022";
    $prg->surrounded = '1';

    $con = mysqli_connect("localhost", "root", "", "amazon_clone");
    $res = mysqli_query($con, "select * FROM `order` WHERE 1");

    $prg->mysql_resource = $res;
    
    $prg->title = "Report on all Orders";
    $prg-> generateReport();
    
    ?>
    <div style="text-align:center">

    <form>

        <input type="button" style="padding:10px;background-color:red;border:1px solid black;font-size:14px;border-radius:8px;color:#fff" onclick="printDiv('report')" value="Print Report"/>
    </form>
    
    </div>
    </div>

    <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }
</script>
</body>

</html>
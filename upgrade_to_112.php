<?

include('config.php');
include('lib.php');
$link = opendb();
$prefix = $dbsettings["prefix"];

// Thanks to Predrag Supurovic from php.net for this function!
function dobatch ($p_query) {
  $query_split = preg_split ("/[;]+/", $p_query);
  foreach ($query_split as $command_line) {
   $command_line = trim($command_line);
   if ($command_line != '') {
     $query_result = mysql_query($command_line);
     if ($query_result == 0) {
       break;
     };
   };
  };
  return $query_result;
}

if (isset($_POST["submit"])) {
    
$users = $prefix . "_users";

$levels = array(1=>"",2=>"",3=>"");
$levels["1"] = array(
    1=>"0",
    2=>"0,1",
    3=>"0,1",
    4=>"0,1,6",
    5=>"0,1,6",
    6=>"0,1,6",
    7=>"0,1,6,11",
    8=>"0,1,6,11",
    9=>"0,1,6,11,2",
    10=>"0,1,6,11,2",
    11=>"0,1,6,11,2",
    12=>"0,1,6,11,2,7",
    13=>"0,1,6,11,2,7",
    14=>"0,1,6,11,2,7,17",
    15=>"0,1,6,11,2,7,17",
    16=>"0,1,6,11,2,7,17",
    17=>"0,1,6,11,2,7,17,12",
    18=>"0,1,6,11,2,7,17,12",
    19=>"0,1,6,11,2,7,17,12",
    20=>"0,1,6,11,2,7,17,12",
    21=>"0,1,6,11,2,7,17,12",
    22=>"0,1,6,11,2,7,17,12",
    23=>"0,1,6,11,2,7,17,12",
    24=>"0,1,6,11,2,7,17,12",
    25=>"0,1,6,11,2,7,17,12,3",
    26=>"0,1,6,11,2,7,17,12,3",
    27=>"0,1,6,11,2,7,17,12,3",
    28=>"0,1,6,11,2,7,17,12,3",
    29=>"0,1,6,11,2,7,17,12,3",
    30=>"0,1,6,11,2,7,17,12,3",
    31=>"0,1,6,11,2,7,17,12,3,8",
    32=>"0,1,6,11,2,7,17,12,3,8",
    33=>"0,1,6,11,2,7,17,12,3,8",
    34=>"0,1,6,11,2,7,17,12,3,8",
    35=>"0,1,6,11,2,7,17,12,3,8",
    36=>"0,1,6,11,2,7,17,12,3,8,18",
    37=>"0,1,6,11,2,7,17,12,3,8,18",
    38=>"0,1,6,11,2,7,17,12,3,8,18",
    39=>"0,1,6,11,2,7,17,12,3,8,18",
    40=>"0,1,6,11,2,7,17,12,3,8,18,13",
    41=>"0,1,6,11,2,7,17,12,3,8,18,13",
    42=>"0,1,6,11,2,7,17,12,3,8,18,13",
    43=>"0,1,6,11,2,7,17,12,3,8,18,13",
    44=>"0,1,6,11,2,7,17,12,3,8,18,13",
    45=>"0,1,6,11,2,7,17,12,3,8,18,13,4",
    46=>"0,1,6,11,2,7,17,12,3,8,18,13,4",
    47=>"0,1,6,11,2,7,17,12,3,8,18,13,4",
    48=>"0,1,6,11,2,7,17,12,3,8,18,13,4",
    49=>"0,1,6,11,2,7,17,12,3,8,18,13,4",
    50=>"0,1,6,11,2,7,17,12,3,8,18,13,4",
    51=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9",
    52=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9",
    53=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9",
    54=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9",
    55=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9",
    56=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9",
    57=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9",
    58=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9",
    59=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9",
    60=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    61=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    62=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    63=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    64=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    65=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    66=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    67=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    68=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    69=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19",
    70=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5",
    71=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5",
    72=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5",
    73=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5",
    74=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5",
    75=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5",
    76=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5",
    77=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5",
    78=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5",
    79=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    80=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    81=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    82=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    83=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    84=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    85=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    86=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    87=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    88=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    89=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    90=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    91=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    92=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    93=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    94=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    95=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    96=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    97=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    98=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10",
    99=>"0,1,6,11,2,7,17,12,3,8,18,13,4,9,19,5,10");

$levels["2"] = array(
    1=>"0",
    2=>"0,1",
    3=>"0,1",
    4=>"0,1",
    5=>"0,1,6",
    6=>"0,1,6",
    7=>"0,1,6",
    8=>"0,1,6,11",
    9=>"0,1,6,11",
    10=>"0,1,6,11",
    11=>"0,1,6,11,2",
    12=>"0,1,6,11,2",
    13=>"0,1,6,11,2",
    14=>"0,1,6,11,2,7",
    15=>"0,1,6,11,2,7",
    16=>"0,1,6,11,2,7",
    17=>"0,1,6,11,2,7",
    18=>"0,1,6,11,2,7,14",
    19=>"0,1,6,11,2,7,14",
    20=>"0,1,6,11,2,7,14",
    21=>"0,1,6,11,2,7,14",
    22=>"0,1,6,11,2,7,14,12",
    23=>"0,1,6,11,2,7,14,12",
    24=>"0,1,6,11,2,7,14,12",
    25=>"0,1,6,11,2,7,14,12,17",
    26=>"0,1,6,11,2,7,14,12,17",
    27=>"0,1,6,11,2,7,14,12,17",
    28=>"0,1,6,11,2,7,14,12,17",
    29=>"0,1,6,11,2,7,14,12,17,3",
    30=>"0,1,6,11,2,7,14,12,17,3",
    31=>"0,1,6,11,2,7,14,12,17,3",
    32=>"0,1,6,11,2,7,14,12,17,3",
    33=>"0,1,6,11,2,7,14,12,17,3",
    34=>"0,1,6,11,2,7,14,12,17,3,8",
    35=>"0,1,6,11,2,7,14,12,17,3,8",
    36=>"0,1,6,11,2,7,14,12,17,3,8",
    37=>"0,1,6,11,2,7,14,12,17,3,8",
    38=>"0,1,6,11,2,7,14,12,17,3,8,15",
    39=>"0,1,6,11,2,7,14,12,17,3,8,15",
    40=>"0,1,6,11,2,7,14,12,17,3,8,15",
    41=>"0,1,6,11,2,7,14,12,17,3,8,15",
    42=>"0,1,6,11,2,7,14,12,17,3,8,15",
    43=>"0,1,6,11,2,7,14,12,17,3,8,15",
    44=>"0,1,6,11,2,7,14,12,17,3,8,15",
    45=>"0,1,6,11,2,7,14,12,17,3,8,15,18",
    46=>"0,1,6,11,2,7,14,12,17,3,8,15,18",
    47=>"0,1,6,11,2,7,14,12,17,3,8,15,18",
    48=>"0,1,6,11,2,7,14,12,17,3,8,15,18",
    49=>"0,1,6,11,2,7,14,12,17,3,8,15,18",
    50=>"0,1,6,11,2,7,14,12,17,3,8,15,18",
    51=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13",
    52=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13",
    53=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13",
    54=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13",
    55=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13",
    56=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13",
    57=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13",
    58=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    59=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    60=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    61=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    62=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    63=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    64=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    65=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    66=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    67=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    68=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    69=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19",
    70=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    71=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    72=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    73=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    74=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    75=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    76=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    77=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    78=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    79=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    80=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    81=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    82=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    83=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    84=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    85=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    86=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    87=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    88=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    89=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    90=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    91=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    92=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    93=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    94=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    95=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    96=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    97=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    98=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16",
    99=>"0,1,6,11,2,7,14,12,17,3,8,15,18,13,19,16");
    
$levels["3"] = array(
    1=>"0",
    2=>"0,1",
    3=>"0,1",
    4=>"0,1",
    5=>"0,1,6",
    6=>"0,1,6",
    7=>"0,1,6",
    8=>"0,1,6,11",
    9=>"0,1,6,11",
    10=>"0,1,6,11",
    11=>"0,1,6,11,2",
    12=>"0,1,6,11,2",
    13=>"0,1,6,11,2",
    14=>"0,1,6,11,2,7",
    15=>"0,1,6,11,2,7",
    16=>"0,1,6,11,2,7",
    17=>"0,1,6,11,2,7",
    18=>"0,1,6,11,2,7,17",
    19=>"0,1,6,11,2,7,17",
    20=>"0,1,6,11,2,7,17",
    21=>"0,1,6,11,2,7,17",
    22=>"0,1,6,11,2,7,17,12",
    23=>"0,1,6,11,2,7,17,12",
    24=>"0,1,6,11,2,7,17,12",
    25=>"0,1,6,11,2,7,17,12,14",
    26=>"0,1,6,11,2,7,17,12,14",
    27=>"0,1,6,11,2,7,17,12,14",
    28=>"0,1,6,11,2,7,17,12,14",
    29=>"0,1,6,11,2,7,17,12,14,3",
    30=>"0,1,6,11,2,7,17,12,14,3",
    31=>"0,1,6,11,2,7,17,12,14,3",
    32=>"0,1,6,11,2,7,17,12,14,3",
    33=>"0,1,6,11,2,7,17,12,14,3",
    34=>"0,1,6,11,2,7,17,12,14,3,8",
    35=>"0,1,6,11,2,7,17,12,14,3,8",
    36=>"0,1,6,11,2,7,17,12,14,3,8",
    37=>"0,1,6,11,2,7,17,12,14,3,8",
    38=>"0,1,6,11,2,7,17,12,14,3,8,18",
    39=>"0,1,6,11,2,7,17,12,14,3,8,18",
    40=>"0,1,6,11,2,7,17,12,14,3,8,18",
    41=>"0,1,6,11,2,7,17,12,14,3,8,18",
    42=>"0,1,6,11,2,7,17,12,14,3,8,18",
    43=>"0,1,6,11,2,7,17,12,14,3,8,18",
    44=>"0,1,6,11,2,7,17,12,14,3,8,18",
    45=>"0,1,6,11,2,7,17,12,14,3,8,18,4",
    46=>"0,1,6,11,2,7,17,12,14,3,8,18,4",
    47=>"0,1,6,11,2,7,17,12,14,3,8,18,4",
    48=>"0,1,6,11,2,7,17,12,14,3,8,18,4",
    49=>"0,1,6,11,2,7,17,12,14,3,8,18,4",
    50=>"0,1,6,11,2,7,17,12,14,3,8,18,4",
    51=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13",
    52=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13",
    53=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13",
    54=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13",
    55=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13",
    56=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9",
    57=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9",
    58=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9",
    59=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9",
    60=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    61=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    62=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    63=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    64=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    65=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    66=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    67=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    68=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    69=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    70=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    71=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    72=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    73=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    74=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    75=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    76=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    77=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    78=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    79=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    80=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    81=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    82=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    83=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    84=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    85=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    86=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    87=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    88=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    89=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    90=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    91=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    92=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    93=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    94=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    95=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    96=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    97=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    98=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15",
    99=>"0,1,6,11,2,7,17,12,14,3,8,18,4,13,9,15");
    
$errors = 0; $errorlist = "";

$mainquery = mysql_query("SELECT id,level,charclass,spells FROM $users ORDER BY id");
while ($mainrow = mysql_fetch_array($mainquery)) {
    $level = $mainrow["level"];
    $charclass = $mainrow["charclass"];
    $newspell = $levels[$charclass][$level];
    $newquery = mysql_query("UPDATE $users SET spells='$newspell' WHERE id='".$mainrow["id"]."' LIMIT 1");
    if ($newquery != true) {
        $errors++; $errorlist .= mysql_error() . "<br />";  
    }
}

$users = $prefix . "_users";
$query = <<<END
ALTER TABLE `$users` CHANGE `towns` `towns` VARCHAR( 50 ) DEFAULT '0' NOT NULL;
ALTER TABLE `$users` CHANGE `spells` `spells` VARCHAR( 50 ) DEFAULT '0' NOT NULL;
END;
if (dobatch($query) == 1) { echo "Users table upgraded.<br />"; } else { $errors++; $errorlist .= "Error upgrading Users table.<br />"; }
unset($query);

if ($errors == 0) { echo "<br />Upgrade finished."; } else { echo $errorlist; }
    
} else {
    
    echo "Click the button below to run the upgrade script.<br /><form action=\"upgrade_to_112.php\" method=\"post\"><input type=\"submit\" name=\"submit\" value=\"Upgrade\" /></form>";
    die();
    
}

?>
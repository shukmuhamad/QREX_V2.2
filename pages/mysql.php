<?php
 require_once 'database_connection2.php';

 date_default_timezone_set('Asia/Kuala_Lumpur');
 $datecreated = date('Y-m-d h:i:s ', time());

 $dataA = array();
 $dataB = array();


 $dataA = $_POST["form_dataA"];
 $dataB = $_POST["form_dataB"];

 // print_r($dataA);
 // print_r($dataB);

 $size = array();
 $sampleSize = array();
 $accFFH = array();
 $accNFG = array();
 $accNAG = array();
 $accMajor = array();
 $accMinor = array();
 $palletNumber = array();
 $palletID = array();

// echo $dataB[8]["value"];
// -------------dataA into array -------------------------


    $factoryName = $dataA[0]["value"];
    $SoNumber = $dataA[1]["value"];
    $itemNumber = $dataA[2]["value"];
    $Brand = $dataA[3]["value"];
    $Customer = $dataA[4]["value"];
    $InspectionPlan = $dataA[5]["value"];
    $Colour = $dataA[6]["value"];
    $lotCount = $dataA[7]["value"];
    $lotNumber = $dataA[8]["value"];
    $ProductType = $dataA[9]["value"];
    $GloveCode = $dataA[10]["value"];



    echo "<br/> Factory:".$factoryName."<br/>";
    echo "<br/> SO Number:".$SoNumber."<br/>";
    echo "<br/> Item Number:".$itemNumber."<br/>";
    echo "<br/> Brand:".$Brand."<br/>";
    echo "<br/> Customer:".$Customer."<br/>";
    echo "<br/> Inspection Plan:".$InspectionPlan."<br/>";
    echo "<br/> Colour:".$Colour."<br/>";
    echo "<br/> Lot count:".$lotCount."<br/>";
    echo "<br/> Lot Number:".$lotNumber."<br/>";
    echo "<br/> Glove Code:".$GloveCode."<br/>";
    echo "<br/> Product type:".$ProductType."<br/>";


// -------------dataB into array -------------------------
     $totalpallet = 0;
     $limit = 9;
     $n = 0;
     $i = 0;
     $j =0;
     foreach ( $dataB as $result){
       if($i == $limit){
                 $i = 0;
                 $n++;
            }else{  }
        if($i == 0){
              $size[$n] = $dataB[$j]["value"];
            }elseif ($i == 1) {
              $sampleSize[$n] = $dataB[$j]["value"];
            }elseif ($i == 2) {
              $accFFH[$n] = $dataB[$j]["value"];
            }elseif ($i == 3) {
              $accNFG[$n] = $dataB[$j]["value"];
            }elseif ($i == 4) {
              $accNAG[$n] = $dataB[$j]["value"];
            }elseif ($i == 5) {
              $accMajor[$n] = $dataB[$j]["value"];
            }elseif ($i == 6) {
              $accMinor[$n] = $dataB[$j]["value"];
            }elseif ($i == 7) {
              $palletNumber[$n] = $dataB[$j]["value"];
            }elseif ($i == 8) {
              $palletID[$n] = $dataB[$j]["value"];
            }else{  }
       $i++;
       $j++;

     }
     $totalpallet = $n+1;

     echo "<br/>";
     echo "<br/>";
     print_r($size);
     print_r($sampleSize);
     print_r($accFFH);
     print_r($accNAG);
     print_r($accNFG);
     print_r($accMajor);
     print_r($accMinor);
     print_r($palletNumber);
     echo "<br/>";
     echo "<br/>";
     echo "Total Pallet:".$totalpallet;

     echo "<br />";

//----------------------- create record in database -------------------------



//
//
//                 $query = "{CALL insert_val(?,?,?)}";
//           $stmt = $connect->prepare($query);
//
//           $stmt->bindParam(1, $size);
//           $stmt->bindParam(2, $target);
//           $stmt->bindParam(3, $unit);
//           $stmt->execute();
//
//                 echo "Data Inserted";


for ($x = 0; $x < $totalpallet; $x++) {
  echo "The pallet id: $palletNumber[$x] <br/>";



  $Plant = $factoryName;
  echo $Plant;
  echo "<br>";

  $PalletID = $palletID[$x];
  echo $PalletID;
  echo "<br>";

  $BatchNumber = '';
  echo $BatchNumber;
  echo "<br>";

  $SONumber = $SoNumber;
  echo $SONumber;
  echo "<br>";

  $SOItemNumber = $itemNumber;
  echo $SOItemNumber."<br>";

  $Customer = $Customer;
  echo $Customer."<br>";

  $Brand = $Brand;
  echo $Brand."<br>";

  $LotNumber = $lotNumber;
  echo $LotNumber."<br>";

  $LotCount = $lotCount;
  echo $LotCount."<br>";

  $InspectionPlan = $InspectionPlan;
  echo $InspectionPlan."<br>";

  $PalletNumber = $palletNumber[$x];
  echo $PalletNumber."<br>";

  $CartonQuantity = '';
  echo $CartonQuantity."<br>";

  $ReinspectionFlag = '0';
  echo $ReinspectionFlag."<br>";

  $ConvertFlag = '0';
  echo $ConvertFlag."<br>";

  $PackingDate = '';
  echo $PackingDate."<br>";

  $PackingShift = '';
  echo $PackingShift."<br>";

  $GloveCode = $GloveCode;
  echo $GloveCode."<br>";

  $GloveColour = $Colour;
  echo $GloveColour."<br>";

  $GloveSurface = 'S';
  echo $GloveSurface."<br>";

  $GloveProductType = $ProductType;
  echo $GloveProductType."<br>";

  $GloveSize = $size[$x];
  echo $GloveSize."<br>";

  $InspectionCount = '0';
  echo $InspectionCount."<br>";

  $RecordCreatedDateTime =  $datecreated;
  echo $RecordCreatedDateTime."<br>";

  $InspectionUserID = '11223344';
  echo $InspectionUserID."<br>";

  $RecordStatusFlag = '0';
  echo $RecordStatusFlag."<br>";

  $UDResult = 'N/A';
  echo $UDResult."<br>";



  $AQL = array(
    array(
      "AQLDescription"=>"AQLMinor",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceMinor",
      "AQLValue"=>$accMinor[$x]
    )
    ,array(
      "AQLDescription"=>"AQLMajor",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceMajor",
      "AQLValue"=>$accMajor[$x]
    )
    ,array(
      "AQLDescription"=>"AQLCritical",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceCritical",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AQLHoles1",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceHoles1",
      "AQLValue"=>$accFFH[$x]
    )
    ,array(
      "AQLDescription"=>"AQLHoles2",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceHoles2",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AQLHoles3",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceHoles3",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AQLOverall",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceOverall",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AQLVisualPackaging",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceVisualPackaging",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AQLCriticalPackaging",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceCriticalPackaging",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AQLRegulatoryPackaging",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceRegulatoryPackaging",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"ResultVisualPackaging",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"ResultCriticalPackaging",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"ResultRegulatoryPackaging",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"FinalDisposition",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AcceptanceNFG",
      "AQLValue"=>$accNFG[$x]
    )
    ,array(
      "AQLDescription"=>"AcceptanceNAG_CP",
      "AQLValue"=>$accNAG[$x]
    )
    ,array(
      "AQLDescription"=>"AQLNFG",
      "AQLValue"=>""
    )
    ,array(
      "AQLDescription"=>"AQLNAG_CP",
      "AQLValue"=>""
    )

  );


  $AQLResult_JSON = json_encode($AQL);
  echo "AQL";
  echo "<br>";
  echo $AQLResult_JSON;

  echo "<br>";
  echo "<br>";
  echo "<br>";

  $ProductionDateWLine=array(
    array(
      "Plant"=>$factoryName,
      "ProductionDate"=>"1900-01-01",
      "Shift"=>"1",
      "ProductionLine"=>"L1",
      "ProductionKey"=>"1"
    ),
    array(
      "Plant"=>$factoryName,
      "ProductionDate"=>"1900-01-01",
      "Shift"=>"2",
      "ProductionLine"=>"L2",
      "ProductionKey"=>"2"
    ),
    array(
      "Plant"=>$factoryName,
      "ProductionDate"=>"1900-01-01",
      "Shift"=>"3",
      "ProductionLine"=>"L3",
      "ProductionKey"=>"3"
    ),
  );



  $ProductionDateWLine_JSON = json_encode($ProductionDateWLine);

  echo "ProductionDate";
  echo "<br>";
  echo $ProductionDateWLine_JSON;


  echo "<br>";
  echo "<br>";
  echo "<br>";

  $DefectResult=array(
    array(
      "Defect"=>"TR",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FK",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DB",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SD",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CA",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CL",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CLD",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DF",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DT",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"EFI",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FM",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FNO",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FO",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"GNO",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"IB",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"ICT",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"L_Major",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"PMI",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"PMO",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"PLM",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"RC",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"RM",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SAG",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SG",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SHN",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SI",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SKV",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SLD",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SO",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"STK",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"STN",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TA",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"UNF",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WL",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WSI",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WSO",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SKV2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"LS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"BP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DSP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DTP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"IA",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"IFS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"IP_MAJOR",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"OP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"RP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SH",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SMP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"BPC",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CR",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DC",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DD",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DIS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FMT",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"L",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"GL",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"NB",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"NF",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TW",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WE",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WG",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"PGM",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SDG",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"URD",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CH",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TAH",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TH",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MF",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"ICP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"NP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"BF",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"P",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CF",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SF",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"THs",
      "DefectValue"=>""
    ),
    // array(
    //   "Defect"=>"FKs",
    //   "DefectValue"=>""
    // ),
    array(
      "Defect"=>"FT",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TRS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"GB",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CHs",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"L_HOLES1",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"BF_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"P_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CF_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SF_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TAHs_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FKS_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"THs_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FT_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TRS_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"GB_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CHs_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"L_HOLES2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"BF_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"P_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CF_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SF_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TAHs_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FKS_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"THs_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FT_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TRS_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"GB_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CHs_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"L_HOLES3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WLN",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WPC",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WMD",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MM",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WED",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"IP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WQ",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WGS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WTS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MSG",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WPD",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WGT",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"PTS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FC",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MSI",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MB",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WGA",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WPO",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"POS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"TRP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MLN",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"OS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DMG",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"BC",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WT",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"PIS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"CT",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MSA",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"POP",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"WIS",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"FG",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"DT_PACKING",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"STNs",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"SLDs",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"Ls",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"GF",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MS_critical",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"PFK",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"GSH",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"LH",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MH",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"LH_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MH_2",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"LH_3",
      "DefectValue"=>""
    ),
    array(
      "Defect"=>"MH_3",
      "DefectValue"=>""
    )
  );



  $DefectResult_JSON = json_encode($DefectResult);
  echo "Defect result";
  echo "<br>";
  echo $DefectResult_JSON;

  echo "<br>";
  echo "<br>";
  echo "<br>";

  $Instrument = array(
    array(
      "Instrument"=>"Weighing Scale ID",
      "InstrumentValue"=>""
    )
    ,array(
      "Instrument"=>"Thickness Gauge",
      "InstrumentValue"=>""
    )
    ,array(
      "Instrument"=>"Ruler ID",
      "InstrumentValue"=>""
    )
    ,array(
      "Instrument"=>"APT/WTT ID",
      "InstrumentValue"=>""
    )
    ,array(
      "Instrument"=>"ThicknessTestingMethod",
      "InstrumentValue"=>""
    )
    ,array(
      "Instrument"=>"HolesTestMethod",
      "InstrumentValue"=>""
    )
  );



  $InstrumentResult_JSON = json_encode($Instrument);


  echo "Instrument result";
  echo "<br>";
  echo $InstrumentResult_JSON;

  echo "<br>";
  echo "<br>";
  echo "<br>";

  $TestResult=array(
    array(
      "Test"=>"ThicknessTestMethod",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"LayeringTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DonningTearingTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DispensingTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"SmellTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"GripTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"StickingTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"PackagingDefectsTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"BlackClothTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"WhiteClothTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"HolesTestMethod",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"GloveWeightTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"GloveWeightAverage",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"CountingTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"CountingAverage",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"LengthTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length1",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length2",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length3",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length4",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length5",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length6",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length7",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length8",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length9",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length10",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length11",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length12",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Length13",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"WidthTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width1",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width2",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width3",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width4",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width5",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width6",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width7",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width8",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width9",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width10",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width11",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width12",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Width13",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"CuffTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff1",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff2",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff3",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff4",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff5",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff6",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff7",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff8",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff9",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff10",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff11",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff12",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff13",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"PalmTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm1",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm2",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm3",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm4",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm5",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm6",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm7",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm8",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm9",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm10",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm11",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm12",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm13",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"FingertipTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip1",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip2",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip3",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip4",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip5",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip6",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip7",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip8",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip9",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip10",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip11",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip12",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip13",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeadingTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading1",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading2",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading3",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading4",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading5",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading6",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading7",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading8",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading9",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading10",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading11",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading12",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading13",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"WristTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist1",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist2",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist3",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist4",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist5",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist6",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist7",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist8",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist9",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist10",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist11",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist12",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist13",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"WeightTest",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight1",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight2",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight3",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight4",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight5",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight6",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight7",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight8",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight9",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight10",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight11",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight12",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight13",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Test 1 Name",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Test 2 Name",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Test 3 Name",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Test 4 Name",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Test 5 Name",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Sealing Test",
      "TestValue"=>"",
      "SRText"=>null
    ),
    array(
      "Test"=>"Dye Leak Test",
      "TestValue"=>"",
      "SRText"=>null
    )
  );

  $TestResult_JSON = json_encode($TestResult);

  echo "TestResult";
  echo "<br>";
  echo $TestResult_JSON;
  echo "<br>";
  echo "<br>";
  echo "<br>";

  $SampleSizeResult=array(
    array(
      "SampleSize"=>"SampleSizeVisual",
      "SampleSizeValue"=>""
    ),
    array(
      "SampleSize"=>"SampleSizeAPT/WTTLevel1",
      "SampleSizeValue"=>$sampleSize[$x]
    ),
    array(
      "SampleSize"=>"SampleSizeAPT/WTTLevel2",
      "SampleSizeValue"=>""
    )
  );


  $SampleSizeResult_JSON = json_encode($SampleSizeResult);

  echo "SampleSizeResult";
  echo "<br>";
  echo $SampleSizeResult_JSON;
  echo "<br>";
  echo "<br>";
  echo "<br>";

  $CartonNum=array(
    array(
      "CartonNum"=>""
    ),
    array(
      "CartonNum"=>""
    ),
    array(
      "CartonNum"=>""
    )
  );


  $CartonNum_JSON = json_encode($CartonNum);

  echo "CartonNum";
  echo "<br>";
  echo $CartonNum_JSON;
  echo "<br>";
  echo "<br>";
  echo "<br>";

  $query = "{CALL SP_AddNewFGRecord(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(1, $Plant);
  $stmt->bindParam(2, $PalletID, PDO::PARAM_INT);
  $stmt->bindParam(3, $BatchNumber, PDO::PARAM_INT);
  $stmt->bindParam(4, $SONumber, PDO::PARAM_INT);
  $stmt->bindParam(5, $SOItemNumber, PDO::PARAM_INT);
  $stmt->bindParam(6, $Customer);
  $stmt->bindParam(7, $Brand);
  $stmt->bindParam(8, $LotNumber, PDO::PARAM_INT);
  $stmt->bindParam(9, $LotCount, PDO::PARAM_INT);
  $stmt->bindParam(10, $InspectionPlan);
  $stmt->bindParam(11, $PalletNumber, PDO::PARAM_INT);
  $stmt->bindParam(12, $CartonQuantity, PDO::PARAM_INT);
  $stmt->bindParam(13, $ReinspectionFlag, PDO::PARAM_INT);
  $stmt->bindParam(14, $ConvertFlag, PDO::PARAM_INT);
  $stmt->bindParam(15, $ProductionDateWLine_JSON);
  $stmt->bindParam(16, $PackingDate);
  $stmt->bindParam(17, $PackingShift, PDO::PARAM_INT);
  $stmt->bindParam(18, $GloveCode);
  $stmt->bindParam(19, $GloveColour);
  $stmt->bindParam(20, $GloveSurface);
  $stmt->bindParam(21, $GloveProductType);
  $stmt->bindParam(22, $GloveSize);
  $stmt->bindParam(23, $CartonNum_JSON );
  $stmt->bindParam(24, $InspectionCount, PDO::PARAM_INT);
  $stmt->bindParam(25, $RecordCreatedDateTime);
  $stmt->bindParam(26, $InspectionUserID, PDO::PARAM_INT);
  $stmt->bindParam(27, $RecordStatusFlag, PDO::PARAM_INT);
  $stmt->bindParam(28, $InstrumentResult_JSON);
  $stmt->bindParam(29, $TestResult_JSON );
  $stmt->bindParam(30, $DefectResult_JSON );
  $stmt->bindParam(31, $AQLResult_JSON );
  $stmt->bindParam(32, $SampleSizeResult_JSON);
  $stmt->bindParam(33, $UDResult);

  $stmt->execute();
}

 ?>

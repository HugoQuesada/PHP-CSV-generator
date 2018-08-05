<?php
  $csvGenerator = new CsvGenerator();
  $csvGenerator->addColumn("Day");
  $csvGenerator->addColumn("Month");
  $csvGenerator->addColumn("Year");
  $csvGenerator->addLine(array("29", "march", "2018"));
  $csvGenerator->addLine(array("16", "december", "2019"));
  $csvGenerator->setFileName("test-data");
  $csvGenerator->activateDownload(true);
  $csvGenerator->generateStruct();
  

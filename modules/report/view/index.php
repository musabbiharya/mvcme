<?php 
        $data['filename']=date('d_F_Y') . ".xls";
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: pre-check=0, post-check=0, max-age=0');
        header("Pragma: no-cache");
        header("Expires: 0");
        header('Content-Transfer-Encoding: none');
        header('Content-Type: application/vnd.ms-excel;');
        header("Content-type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=" . $data['filename']);


        print "<?xml version=\"1.0\"?>";
        print "<?mso-application progid=\"Excel.Sheet\"?>"; 
        $propinsi = [
            ['kol1'=>1,'kol2'=>2],
            ['kol1'=>2,'kol2'=>3],
            ['kol1'=>3,'kol2'=>4]
            ];
        ?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
          xmlns:o="urn:schemas-microsoft-com:office:office"
          xmlns:x="urn:schemas-microsoft-com:office:excel"
          xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
          xmlns:html="http://www.w3.org/TR/REC-html40">
    <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
        <Author>head.berjayateknikbersama.com</Author>
        <Created><?php echo date('Y-m-d H:i:s') ?></Created>
        <Company>BTB</Company>
        <Version>1.1</Version>
    </DocumentProperties>
    <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
        <WindowHeight>8535</WindowHeight>
        <WindowWidth>12345</WindowWidth>
        <WindowTopX>480</WindowTopX>
        <WindowTopY>90</WindowTopY>
        <ProtectStructure>False</ProtectStructure>
        <ProtectWindows>False</ProtectWindows>
    </ExcelWorkbook>
    <Styles>
        <Style ss:ID="Default" ss:Name="Normal">
            <Alignment ss:Vertical="Bottom"/>
            <Font ss:Size="8" ss:FontName="Arial" x:Family="Swiss" />
        </Style>
        <Style ss:ID="Head01">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1" />
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="9" ss:Bold="1"/>
            <Interior ss:Color="#D7E4BC" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="HeadPutih">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1" />
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="9" ss:Bold="1"/>
            <Interior ss:Color="#F0F0F0" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="HeadPurple">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1" />
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="9" ss:Bold="1"/>
            <Interior ss:Color="#9F77D6" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="HeadRed">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1" />
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="9" ss:Bold="1"/>
            <Interior ss:Color="#E0676B" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="HeadYellow">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1" />
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="9" ss:Bold="1"/>
            <Interior ss:Color="#F2F2A7" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="Row01">
            <Alignment ss:Vertical="Top" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
        </Style>
        <Style ss:ID="Row01Bold">
            <Alignment ss:Vertical="Top" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8" ss:Bold="1"/>
        </Style>
        <Style ss:ID="Row01Yellow">
            <Alignment ss:Vertical="Center" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8" ss:Bold="1"/>
            <Interior ss:Color="#ffff00" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="Row01YellowRight">
            <Alignment ss:Vertical="Center" ss:Horizontal="Right" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8" ss:Bold="1"/>
            <Interior ss:Color="#ffff00" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="Row01YellowCenter">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8" ss:Bold="1"/>
            <Interior ss:Color="#ffff00" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="Row01Red">
            <Alignment ss:Vertical="Center" ss:Horizontal="Right" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8" ss:Bold="1"/>
            <Interior ss:Color="#ff0000" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="Row01Right">
            <Alignment ss:Vertical="Top" ss:Horizontal="Right" />
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
        </Style>
        <Style ss:ID="Row01Center">
            <Alignment ss:Horizontal="Center" ss:Vertical="Top" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
        </Style>  
        <Style ss:ID="Row02">
            <Alignment ss:Horizontal="Center" ss:Vertical="Bottom" />
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
        </Style>  
        <Style ss:ID="s25">
            <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
            <Font x:Family="Swiss" ss:Size="8"/>
        </Style>
        <Style ss:ID="Title01">
            <Font x:Family="Swiss" ss:Size="12" ss:Bold="1"/>
        </Style> 
        <Style ss:ID="Title02">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
            <Font x:Family="Swiss" ss:Bold="1"  ss:Size="14"/>
        </Style>
        <Style ss:ID="Title02Left">
            <Alignment ss:Vertical="Center"/>
            <Font x:Family="Swiss" ss:Bold="1"  ss:Size="14"/>
        </Style>  
        <Style ss:ID="Title03">
            <Alignment ss:Vertical="Center" ss:Horizontal="Center"/>
            <Font x:Family="Swiss" ss:Size="11" ss:Bold="1"/>
        </Style>
        <Style ss:ID="NotAvailable">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font x:Family="Swiss" ss:Size="9" ss:Bold="1" />
        </Style>
        <Style ss:ID="Quota">
            <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
            <Font x:Family="Swiss" ss:Size="9" ss:Bold="1"/>
        </Style>   
        <Style ss:ID="N01">
            <Alignment ss:Horizontal="Right" ss:Vertical="Top"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
            <Interior/>
            <NumberFormat ss:Format="Standard"/>
            <Protection/>
        </Style>

        <Style ss:ID="RightBold">
            <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8" ss:Bold="1" />
            <Interior ss:Color="#c3f7c3" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="Total">
            <Alignment ss:Vertical="Top"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font x:Family="Swiss" ss:Bold="1"  ss:Size="12"/>
        </Style> 
        <Style ss:ID="Titleku">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
            <Font x:Family="Swiss" ss:Size="14" ss:Bold="1"/>
        </Style>
        <Style ss:ID="TitlekuLeft">
            <Alignment ss:Horizontal="Left" ss:Vertical="Center"/>
            <Font x:Family="Swiss" ss:Size="14" ss:Bold="1"/>
        </Style>
        <Style ss:ID="kuCenter">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
        </Style> 
        <Style ss:ID="kuRight">
            <Alignment ss:Horizontal="Right" ss:Vertical="Center" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
        </Style> 
        <Style ss:ID="kuLeft">
            <Alignment ss:Horizontal="Left" ss:Vertical="Center" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
        </Style>
        <Style ss:ID="merahCenter">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
            <Interior ss:Color="#ff0000" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="merahRight">
            <Alignment ss:Horizontal="Right" ss:Vertical="Center" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
            <Interior ss:Color="#ff0000" ss:Pattern="Solid"/>
        </Style>
        <Style ss:ID="merahLeft">
            <Alignment ss:Horizontal="Left" ss:Vertical="Center" ss:WrapText="1"/>
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
            <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="8"/>
            <Interior ss:Color="#ff0000" ss:Pattern="Solid"/>
        </Style>
    </Styles>

    <Worksheet ss:Name="Propinsi">  	
            <Table ss:ExpandedColumnCount="256"  x:FullColumns="1" x:FullRows="1">
                <Column ss:AutoFitWidth="0" ss:Width="50"/><!--no-->
                <Column ss:Width="300"/>
                <Column ss:Width="100"/>
                <Column ss:Width="100"/>

                <Row ss:AutoFitHeight="0" ss:Height="15.75"/>
                <Row ss:AutoFitHeight="0" ss:Height="15.75">
                    <Cell ss:StyleID="Title02" ss:MergeAcross="2" ><Data ss:Type="String">Rekap SIPJAKI per Propinsi</Data> </Cell>
                </Row>
                <Row ss:AutoFitHeight="0" ss:Height="15.75"/>	
                <Row ss:AutoFitHeight="0" ss:Height="25" >
                    <Cell ss:StyleID="HeadPutih" ><Data ss:Type="String">No.</Data></Cell>
                    <Cell ss:StyleID="HeadPutih" ><Data ss:Type="String">Propinsi</Data></Cell>
                    <Cell ss:StyleID="HeadPutih" ><Data ss:Type="String">IUJK Nasional</Data></Cell>
                </Row>
                <?php
                $i = 1;
                foreach ($propinsi as $prop) {
                    
                    ?>
                    <Row ss:StyleID="Default">
                        <Cell ss:StyleID="Row01"><Data ss:Type="Number"><?php echo $i; ?></Data></Cell>					
                        <Cell ss:StyleID="Row01"><Data ss:Type="String"><?php echo $prop['kol1']; ?></Data></Cell>
                        <Cell ss:StyleID="Row01Right"><Data ss:Type="Number"><?php echo $prop['kol2']; ?></Data></Cell>
                    </Row>
                    <?php
                    $i++;
                }
                ?>

            </Table>

            <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
                <Print>
                    <ValidPrinterInfo/>
                    <HorizontalResolution>300</HorizontalResolution>
                    <VerticalResolution>300</VerticalResolution>
                </Print>
                <Selected/>
                <Panes>
                    <Pane>
                        <Number>3</Number>
                        <ActiveRow>1</ActiveRow>
                    </Pane>
                </Panes>
                <ProtectObjects>False</ProtectObjects>
                <ProtectScenarios>False</ProtectScenarios>
            </WorksheetOptions> 
        </Worksheet>
</Workbook>
<?php
/**/?>
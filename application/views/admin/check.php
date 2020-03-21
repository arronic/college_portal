<html>

        <head>
            <title>Receipt</title>
            <style>
                h1,
                h2,
                h3,
                h5 {
                    text-align: center;
                }
        
                h4 {
                    text-align: left;
                }
        
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }
        
                td,
                th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 4px;
                }
        
                .container {
                    margin: 50px;
                }
        
                .bold {
                    font-weight: bold;
                }
        
                .underline {
                    text-decoration: underline;
                }
        
                .text-center {
                    text-align: center;
                }
        
                .text-right {
                    text-align: right;
                }
        
                .text-left {
                    text-align: left;
                }
        
                .float-right {
                    float: right;
                }
        
                .italic {
                    font-style: italic;
                }
        
                span.a {
                    display: inline;
                    padding: 5px;
                }
        
                .narrow {
                    float: right;
                    width: 50%;
                }
        
                .wide {
                    float: left;
                    width: 50%;
                }
                .font-large{
                    font-size: 18px;
                }
                .split {
                  height: 100%;
                  width: 40%;
                  position: fixed;
                  z-index: 1;
                  top: 0;
                  overflow-x: hidden;
                  // padding-top: 20px;
                }

                .left {
                  left: 0;
                  // background-color: #111;
                }

                .right {
                  right: 0;
                  // background-color: red;
                }
            </style>
        </head>
        
        <body>
        <div class="split left">
            <div class="custom-header text-center">
                <div class="bold font-large">Jaleswar College, Address</div>
                <div class="bold text-center">ESTD:1947</div>
                <div class="bold text-center">P.O.: Post Office, DIST: District</div>
                <div class="bold text-center">PIN: 123456</div>
            </div>
            <div class="text-center">Payment Receipt</div>
            <div class="">
                <span><strong>Name:</strong>'.$sd->name.'</span>
                <span class="float-right"><strong>Course:</strong>'.$sd->course.'</span>

                <table style="width:100%; font-size: 10px; margin: 15px 0px 25px 0px;">
                <tr>
                    <th>Sl No.</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Admission Fee</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tuition fee</td>
                    <td>1860</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Establishment</td>
                    <td>600</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Electricity</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Contingency</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>University Fee</td>
                    <td>620</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>ID Card Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Development Fee</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Library Fee</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Internal Exam. Fee</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Magazine Fee</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Student Union Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Games and Sports Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Festive Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Co-Curricular Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Cultural/Music Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Debating/Literature Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Student Welfare Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>ICT</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td>4610</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Amount Paid</td>
                    <td>4610</td>
                </tr>
            </table>
                </p>
            </div>
            
                <span class="a float-right" style="font-size: 10px">Receiving Officer: ..........................</span>
                <span class="a" style="font-size: 10px">Date:'.date('d-m-Y').'</span>
            </div>
            </div>
            <div class="split right">
            <div class="custom-header text-center">
                <div class="bold font-large">Jaleswar College, Address</div>
                <div class="bold text-center">ESTD:1947</div>
                <div class="bold text-center">P.O.: Post Office, DIST: District</div>
                <div class="bold text-center">PIN: 123456</div>
            </div>
            <div class="text-center">Payment Receipt</div>
            <div class="">
                <span><strong>Name:</strong>'.$sd->name.'</span>
                <span class="float-right"><strong>Course:</strong>'.$sd->course.'</span>

                <table style="width:100%; font-size: 10px; margin: 15px 0px 25px 0px;">
                <tr>
                    <th>Sl No.</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Admission Fee</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tuition fee</td>
                    <td>1860</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Establishment</td>
                    <td>600</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Electricity</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Contingency</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>University Fee</td>
                    <td>620</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>ID Card Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Development Fee</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Library Fee</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Internal Exam. Fee</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Magazine Fee</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Student Union Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Games and Sports Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Festive Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Co-Curricular Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Cultural/Music Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Debating/Literature Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Student Welfare Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>ICT</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td>4610</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Amount Paid</td>
                    <td>4610</td>
                </tr>
            </table>
                </p>
            </div>
            
                <span class="a float-right" style="font-size: 10px">Receiving Officer: ..........................</span>
                <span class="a" style="font-size: 10px">Date:'.date('d-m-Y').'</span>
            </div>
            </div>
        </body>
        
        </html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>

    @page { margin: 0px; }
    body { margin: 0px; }
        .custom-font {
            font-weight: bold;
        }


        table.blueTable {
            border: 1px solid #000000;
            background-color: #ffffff;
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }

        table.blueTable td,
        table.blueTable th {
            border: 1px solid #020202;
            padding: 3px 2px;
        }

        table.blueTable tbody td {
            font-size: 13px;
        }

        table.blueTable tr:nth-child(even) {
            background: #ffffff;
        }

        table.blueTable thead {
            background: #1c6ea4;
            background: -moz-linear-gradient(top,
                #5592bb 0%,
                #327cad 66%,
                #1c6ea4 100%);
            background: -webkit-linear-gradient(top,
                #5592bb 0%,
                #327cad 66%,
                #1c6ea4 100%);
            background: linear-gradient(to bottom,
                #5592bb 0%,
                #327cad 66%,
                #1c6ea4 100%);
            border-bottom: 2px solid #444444;
        }

        table.blueTable thead th {
            font-size: 15px;
            font-weight: bold;
            color: #ffffff;
            border-left: 2px solid #d0e4f5;
        }

        table.blueTable tfoot td {
            font-size: 14px;
        }

        table.blueTable tfoot .links {
            text-align: right;
        }


    </style>
</head>
<body>
<table border="0" align="center">
    <tr>
        <td>
            <img src="{{ public_path().'/img/logo_kab_garut.png'  }}" width="70" height="70" alt="">
        </td>
        <td>
            <center>
                <font size="4">PEMERINTAH KABUPATEN GARUT</font><br>
                <font size="6">DINAS KESEHATAN</font><br>
                <font size="4">UPT PUSKESMAS SUKAMULYA</font><br>
                <font size="2">Jln. Sukamulya No. 12 Desa Sukamulya Kec. Sukaresmi Kab. Garut 44162</font>
            </center>
        </td>
        <td>
        <img src="{{ public_path().'/img/logo_puskesmas.png'  }}" width="70" height="70" alt="">
        </td>
    </tr>
</table>

 <table class="blueTable">
        <thead>
            <tr>
                <th colspan="4" style="text-align: center">
                    Payslip for the Month of XYZ - 2019
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="custom-font">Name Of Employee</td>
                <td>Placeholder</td>


                <td class="custom-font">Payable Days</td>
                <td>Placeholder</td>
            </tr>

            <tr>
                <td class="custom-font">Employee Code</td>
                <td>Placeholder</td>


                <td class="custom-font">Paid Days</td>
                <td>Placeholder</td>
            </tr>

            <tr>
                <td class="custom-font">Designation</td>
                <td>Placeholder</td>

                <td class="custom-font">Joining Date</td>
                <td>Placeholder</td>
            </tr>

            <tr>
                <td class="custom-font">PAN No.</td>
                <td>Placeholder</td>

                <td class="custom-font">Date Of Birth</td>
                <td>Placeholder</td>
            </tr>
            <tr>
                <td class="custom-font">Aadhaar No.</td>
                <td>Placeholder</td>

                <td class="custom-font">Bank Name</td>
                <td>Placeholder</td>
            </tr>
            <tr>
                <td class="custom-font">PF No.</td>
                <td>Placeholder</td>

                <td class="custom-font">Bank Account No</td>
                <td>Placeholder</td>
            </tr>
            <tr>
                <td class="custom-font">UAN</td>
                <td>Placeholder</td>

                <td class="custom-font">Location</td>
                <td>Placeholder</td>
            </tr>

            <!-- space -->
            <tr style="border-right:">
                <td style="border-right-style: hidden;">&nbsp;</td>
                <td style="border-right-style: hidden;">&nbsp;</td>
                <td style="border-right-style: hidden;">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <!-- Salary info -->
            <tr style="text-align: center">
                <th>Earnings</th>
                <th>Amount[INR]</th>
                <th>Deductions</th>
                <th>Amount[INR]</th>
            </tr>

            <tr>
                <td class="custom-font">Basic Salary</td>
                <td></td>

                <td class="custom-font">Provident Fund</td>
                <td></td>
            </tr>

            <tr>
                <td class="custom-font">House Rent Allowance</td>
                <td class="custom-font"></td>

                <td class="custom-font">Professional Tax</td>
                <td></td>
            </tr>

            <tr>
                <td class="custom-font">Conveyance Allowance</td>
                <td></td>

                <td class="custom-font">TDS</td>
                <td></td>
            </tr>

            <tr>
                <td class="custom-font">Medical Allowance</td>
                <td></td>

                <td rowspan="3"></td>
                <td rowspan="3"></td>
            </tr>

            <tr>
                <td class="custom-font">Mobile Allowance</td>
                <td></td>
            </tr>

            <tr>
                <td class="custom-font">Executive Allowance</td>
                <td></td>
            </tr>

            <!-- space -->
            <tr>
                <td style="border-right-style: hidden;">&nbsp;</td>
                <td style="border-right-style: hidden;">&nbsp;</td>
                <td style="border-right-style: hidden;">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <!-- Totals -->
            <tr>
                <th>Total Earnings</th>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>

            <tr>
                <th colspan="4">Net Pay : - Rs. 00,000.00/-</th>
            </tr>
            <tr>
                <th colspan="4">
                    Net Pay (In Words): - Rs. 0 Thousand 0 Hundred and 0 Only
                </th>
            </tr>

            <!-- space -->
            <tr style="border-bottom:hidden">
                <td colspan="4" style="border-left-style: hidden;border-right-style: hidden;text-align: center">
                    "This is a computer generated statement and does not require any
                    signature or stamp."
                </td>
            </tr>

            <!-- leave details -->
            <tr>
                <th class="custom-font" colspan="4" style="border-left-style:hidden;border-right-style:hidden">Leave Balance</th>
            </tr>

            <tr>
                <td class="custom-font" colspan="2">Accumulated Leave (Opening Leaves)</td>
                <td colspan="2">0</td>
            </tr>

            <tr>
                <td class="custom-font" colspan="2">Leave Taken</td>
                <td colspan="2">0</td>
            </tr>

            <tr>
                <td class="custom-font" colspan="2">Leave Balance (Closing Leaves)</td>
                <td colspan="2">0</td>
            </tr>
        </tbody>
    </table> -->
</body>
</html>

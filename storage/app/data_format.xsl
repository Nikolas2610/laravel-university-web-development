<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                    border-spacing: 0;
                    margin-bottom: 20px;
                    background-color: #333333;
                    color: #fff;
                }

                th, td {
                    text-align: left;
                    padding: 12px;
                    border-bottom: 1px solid #555555;
                }

                th {
                    background-color: #444444;
                    color: #fff;
                }

                tr:nth-child(odd) {
                    background-color: #111222;
                }

                tr:hover {
                    background-color: #222222;
                }
            </style>
            <head>
                <title>XML Data</title>
            </head>
            <body>
                <h2>Συνολικός αριθμός προσφορών:                    <span>
                        <xsl:value-of select="company/offers_count"/>
                    </span>
                </h2>
                <table border="1">
                    <tr>
                        <th>Τύπος καυσίμου</th>
                        <th>Μέγιστη τιμή</th>
                        <th>Ελάχιστη τιμή</th>
                    </tr>
                    <xsl:for-each select="company/fuels/fuel_stats">
                        <tr>
                            <td>
                                <xsl:value-of select="name"/>
                            </td>
                            <td>
                                <xsl:value-of select="max"/>
                            </td>
                            <td>
                                <xsl:value-of select="min"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
                <h1>Επιχείρηση</h1>
                <table border="1">
                    <tr>
                        <th>Επωνυμία</th>
                        <th>ΑΦΜ</th>
                        <th>Διεύθυνση</th>
                        <th>Δήμος</th>
                        <th>Νομός</th>
                    </tr>
                    <tr>
                        <td>
                            <xsl:value-of select="company/company_name"/>
                        </td>
                        <td>
                            <xsl:value-of select="company/afm"/>
                        </td>
                        <td>
                            <xsl:value-of select="company/location/address"/>
                        </td>
                        <td>
                            <xsl:value-of select="company/location/municipality"/>
                        </td>
                        <td>
                            <xsl:value-of select="company/location/county"/>
                        </td>
                    </tr>
                </table>

                <h1>Προσφορές</h1>
                <table>
                    <tr>
                        <th>Τύπος καυσίμου</th>
                        <th>Ημερομηνία λήξης</th>
                        <th>Τιμή</th>
                        <th>Κατάσταση προσφοράς</th>
                    </tr>
                    <xsl:for-each select="company/offers/offer">
                        <tr>
                            <td>
                                <xsl:value-of select="fuel"/>
                            </td>
                            <td>
                                <xsl:value-of select="expire_date"/>
                            </td>
                            <td>
                                <xsl:value-of select="amount"/>
                            </td>
                            <td>
                                <xsl:value-of select="status"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

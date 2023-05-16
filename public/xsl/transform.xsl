<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>View XML2</title>
                <style>
                    /* Add your CSS styling here */
                </style>
            </head>
            <body>
                <h1>XML Data</h1>
                <xsl:apply-templates select="root/επιχείρηση"/>
            </body>
        </html>
    </xsl:template>

    <xsl:template match="επιχείρηση">
        <h2><xsl:value-of select="επωνυμία"/></h2>
        <p>ΑΦΜ: <xsl:value-of select="αφμ"/></p>
        <p>Διεύθυνση: <xsl:value-of select="τοποθεσία/διεύθυνση"/></p>
        <p>Δήμος: <xsl:value-of select="τοποθεσία/δήμος"/></p>
        <p>Νομός: <xsl:value-of select="τοποθεσία/νομός"/></p>

        <h3>Προσφορές</h3>
        <table border="1">
            <tr>
                <th>Τύπος καυσίμου</th>
                <th>Ημερομηνία λήξης προσφοράς</th>
                <th>Τιμή</th>
                <th>Κατάσταση προσφοράς</th>
            </tr>
            <xsl:for-each select="προσφορές/προσφορά">
                <tr>
                    <td><xsl:value-of select="τύπος_καυσίμου"/></td>
                    <td><xsl:value-of select="ημερομηνία_λήξης"/></td>
                    <td><xsl:value-of select="τιμή"/></td>
                    <td><xsl:value-of select="κατάσταση_προσφοράς"/></td>
                </tr>
            </xsl:for-each>
        </table>
    </xsl:template>
</xsl:stylesheet>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<!-- Example slashdot.xsl -->
 <xsl:param name="site" select="'slashdot.org'"/>
 <xsl:output method="html" encoding="iso-8859-1" indent="no"/>
 <xsl:template match="/">
  <html><body><center>
  <h1>Welcome to latest extract from <xsl:value-of select="$site"/></h1>
  <table border="1" width="75%">
  <xsl:apply-templates/>
  </table>
  </center></body></html>
 </xsl:template>
 <xsl:template match="story">
  <tr>
   <td>
    <a>
     <xsl:attribute name="href">
      <xsl:value-of select="url"/>
     </xsl:attribute>
     <xsl:value-of select="title"/>
    </a>
   </td>
   <td><xsl:value-of select="author"/></td>
  </tr>
 </xsl:template>
</xsl:stylesheet>

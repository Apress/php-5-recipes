<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
 <xsl:param name="site" select="'slashdot.org'"/>
 <xsl:output method="html" encoding="iso-8859-1" indent="no"/>
 <xsl:template match="backslash">
  <html><body>
  Welcome to latest extract from <xsl:value-of select="$site"/>
  <table border="0">
  <xsl:apply-templates/>
  </table>
  </body></html>
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

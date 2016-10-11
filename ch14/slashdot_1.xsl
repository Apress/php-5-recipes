<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
 <xsl:param name="site" select="'slashdot.org'"/>
 <xsl:output method="text" encoding="iso-8859-1" indent="no"/>
 <xsl:template match="backslash">
  Welcome to latest extract from <xsl:value-of select="$site"/> -
  <xsl:apply-templates />
 </xsl:template>
 <xsl:template match="story">
  <xsl:value-of select="title"/> - <xsl:value-of select="author"/> -
 </xsl:template>
</xsl:stylesheet>

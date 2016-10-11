<?php
// Example 10-2-4.php
$Values = array(
	NULL,
	True,
	False,
	1,
	0,
	1.0,
	0.0,
	"1",
	"0",
	array(1),
	(object)array(1)
);

function dump_value($var) {
	switch (gettype($var)) {
		case 'NULL':
			return "NULL";
			break;
		case 'boolean':
			return $var ? "True" : "False";
			break;
		default :
		case 'integer':
			return $var;
			break;
		case 'double':
			return sprintf("%0.1f", $var);
			break;
		case 'string':
			return "'$var'";
			break;
		case 'object':
		case 'array':
			return gettype($var);
			break;
	}
}

function CreateTable($Values, $type = "==") {
	echo "<table border=1>";
	echo "<tr><td>$type</td>";
		foreach ($Values as $x_val) {
			echo "<td bgcolor=lightgrey>" . dump_value($x_val) . "</td>";
		}
	echo "</tr>";
	foreach ($Values as $y_val) {
		echo "<tr><td bgcolor=lightgrey>" . dump_value($y_val) . "</td>";
		foreach ($Values as $x_val) {
			if ($type == "==") {
				$result = dump_value($y_val == $x_val);
			}
			else {
				$result = dump_value($y_val === $x_val);
			}
			echo "<td>$result</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

echo "<html><body>";
CreateTable($Values, "==");
echo "<br>";
CreateTable($Values, "===");
echo "</body></html>";
?>
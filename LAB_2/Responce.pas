PROGRAM Response(INPUT, OUTPUT);
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN(GetEnv('QUERY_STRING'))
END.

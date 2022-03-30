PROGRAM Hello(INPUT, OUTPUT);
USES Dos;
USES crt;

VAR
  Name: STRING;

BEGIN
  WRITELN('Content-Tipy: text/plain');
  WRITELN;
  Name := GetEnv('QUERY_STRING');
  IF Name = ''
  THEN
    WRITELN('Hello Anonymous')
  ELSE
    BEGIN
      Name := delete(Name, 0, 5);
      WRITELN('Hello dear, ', Name)
    END
END.
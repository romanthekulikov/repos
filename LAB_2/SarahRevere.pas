PROGRAM SarahRevere(INPUT, OUTPUT);
USES Dos;

VAR
  Lanter: STRING;

BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Lanter := GetEnv('QUERY_STRING');
  IF Lanter = 'lanterns=1'
  THEN
    WRITELN('Coming by sea');
  IF Lanter = 'lanterns=2'
  THEN
    WRITELN('Coming by air')
END.
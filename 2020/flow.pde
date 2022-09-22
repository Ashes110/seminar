import java.util.Objects;
Table csvDataLine;
String[] time = new String[5];

int action = 0;

int[][] status;

String dat;
int Y = 2013;
int M, D;
int h = 0;
int m = 0;
int s = 0;

void setup() {
  background(255);
  fullScreen();

  csvDataLine = loadTable("csv_name");
  dat = "2013-07-01 00:00:00";
  M = 7;
  D = 1;

  frameRate(3);
}

void draw() {

  background(255);

  for (int i=1; i<csvDataLine.getRowCount(); i++) {

    if (Objects.equals(csvDataLine.getString(i, 3), dat)) {//同時刻

    textSize(50);
    fill(0);
    text(dat, 1300, 100);

    circle(csvDataLine.getFloat(i, 5) * 600 - 83000, height - (csvDataLine.getFloat(i, 4) * 600 -21000), 1);
    }
  }

  if (m<55) {//時間処理
    m = m + 5;
  } else {
    h++;
    m = 0;
  }
  time = dat.split("[ :-]", 0);
  dat = nf(Y, 4) + "-" + nf(M, 2) + "-" + nf(D, 2) + " " + nf(h, 2) + ":" + nf(m, 2) + ":" + nf(s, 2);
  if (h==24) {
    noLoop();
  }
}

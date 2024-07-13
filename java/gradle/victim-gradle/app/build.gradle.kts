/*
 * This file was generated by the Gradle 'init' task.
 *
 * This generated file contains a sample Java application project to get you started.
 * For more details on building Java & JVM projects, please refer to https://docs.gradle.org/8.9/userguide/building_java_projects.html in the Gradle documentation.
 */

plugins {
    // Apply the application plugin to add support for building a CLI application in Java.
    application
}

repositories {
    // Use Maven Central for resolving dependencies.
    mavenCentral()
    maven {
        name = "GitHubPackages"
        url = uri("https://maven.pkg.github.com/FredBonux/java-injection")
        credentials {
            username = project.findProperty("gpr.user").toString()
            password = project.findProperty("gpr.key").toString()
        }
    }
    maven {
        name = "Reposlite"
        url = uri("http://localhost/releases/org/evil/fakelibrary")
        isAllowInsecureProtocol = true
    }
}

dependencies {
    // Use JUnit Jupiter for testing.
    testImplementation(libs.junit.jupiter)

    testRuntimeOnly("org.junit.platform:junit-platform-launcher")

    // This dependency is used by the application.
    implementation(libs.guava)

    implementation("org.evil:attackerlibrary:1.0")
    implementation("org.test:nicelibrary:1.2")
//    implementation("org.test")
}

// Apply a specific Java toolchain to ease working on different environments.
java {
    toolchain {
        languageVersion = JavaLanguageVersion.of(21)
    }
}

application {
    // Define the main class for the application.
    mainClass = "org.example.App"
}

tasks.named<Test>("test") {
    // Use JUnit Platform for unit tests.
    useJUnitPlatform()
}

task("dependencyList") {
    doFirst {
        println(configurations.runtimeClasspath.get().files.joinToString(separator = ":"))
    }
}